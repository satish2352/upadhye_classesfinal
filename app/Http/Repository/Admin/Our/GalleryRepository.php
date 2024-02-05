<?php
namespace App\Http\Repository\Admin\Our;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	OurResult,
    GalleryCategory
};
use Config;

class GalleryRepository  {
	public function getAll(){
        try {
            $gallerymain = OurResult::join('ourresult_category', 'ourresult_category.id','=', 'ourresult.Category_id')
            ->select('ourresult.is_active as is_active', 'ourresult_category.title as title','ourresult.id as id','ourresult.category_id as category_id', 'ourresult.image as image')
           ->orderBy('ourresult.created_at', 'desc')
            ->get();
        return $gallerymain;
            
        } catch (\Exception $e) {
            return $e;
        }
    }
	public function addAll($request){
    try {
        $data =array();
        $gallery = new OurResult();
        $gallery->category_id = $request['category_id'];
        $gallery->save();
          
        $last_insert_id = $gallery->id;
        

        $englishImageName = $last_insert_id .'_'. rand(100000, 999999) . '_english.' . $request->image->extension();
        
        $gallerys = OurResult::find($last_insert_id); // Assuming $request directly contains the ID
       
        $gallerys->image = $englishImageName; // Save the image filename to the database
     
        $gallerys->save();

         $data['englishImageName'] =$englishImageName;
        return $data;

    } catch (\Exception $e) {
        return [
            'msg' => $e,
            'status' => 'error'
        ];
    }
}

public function getById($id)
{
    try {
        $gallery = OurResult::find($id);
        if ($gallery) {
            return $gallery;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
    }
}

public function updateAll($request)
{
    try {
        $return_data = array();
        $update_gallery = OurResult::find($request->id);
        
        if (!$update_gallery) {
            return [
                'msg' => 'Gallery data not found.',
                'status' => 'error'
            ];
        }
       // Store the previous image names
       $previousEnglishImage = $update_gallery->image;

       $update_gallery->save();        
       $last_insert_id = $update_gallery->id;

       $return_data['last_insert_id'] = $last_insert_id;
       $return_data['image'] = $previousEnglishImage;
       return  $return_data;
       
    } catch (\Exception $e) {
        return $e;
    }
}
public function updateOne($request)
{
    try {
        $gallery = GalleryMain::find($request); // Assuming $request directly contains the ID

        // Assuming 'is_active' is a field in the Slider model
        if ($gallery) {
            $is_active = $gallery->is_active === 1 ? 0 : 1;
            $gallery->is_active = $is_active;
            $gallery->save();

            return [
                'msg' => 'Gallery updated successfully.',
                'status' => 'success'
            ];
        }

        return [
            'msg' => 'Gallery not found.',
            'status' => 'error'
        ];
    } catch (\Exception $e) {
        return [
            'msg' => 'Failed to update Gallery.',
            'status' => 'error'
        ];
    }
}

public function deleteById($id)
{
    try {
        $gallery = OurResult::find($id);
        if ($gallery) {
             // Delete the images from the storage folder
             if (file_exists_view(Config::get('DocumentConstant.GALLERY_MAIN_DELETE') . $gallery->image)) {
                removeImage(Config::get('DocumentConstant.GALLERY_MAIN_DELETE') . $gallery->image);
            }
           
            $gallery->delete();

            return $gallery;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
    }
}
       
}