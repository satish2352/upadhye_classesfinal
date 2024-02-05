<?php
namespace App\Http\Repository\Admin\OurResult;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	OurResult,
    OurResultCategory
};
use Config;

class OurResultRepository  {
	public function getAll()
{
    try {
        $gallery = OurResult::join('ourresult_category', 'ourresult_category.id', '=', 'ourresult.category_id')
            ->select('ourresult.is_active as is_active', 'ourresult_category.title as title', 'ourresult.id as id', 'ourresult.category_id as category_id', 'ourresult.image as image')
            ->orderBy('ourresult.id', 'desc') // Order by 'id' column in descending order
            ->get();

        return $gallery;

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
        $update_gallery = array();
        $update_gallery = OurResult::find($request->id);
        
        if (!$update_gallery) {
            return [
                'msg' => 'Our Result data not found.',
                'status' => 'error'
            ];
        }
       // Store the previous image names
    //    $update_gallery->category_id = $request['category_id'];
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
        $gallery = Gallery::find($request); // Assuming $request directly contains the ID

        // Assuming 'is_active' is a field in the Slider model
        if ($gallery) {
            $is_active = $gallery->is_active === 1 ? 0 : 1;
            $gallery->is_active = $is_active;
            $gallery->save();

            return [
                'msg' => 'Our Result updated successfully.',
                'status' => 'success'
            ];
        }

        return [
            'msg' => 'Our Result not found.',
            'status' => 'error'
        ];
    } catch (\Exception $e) {
        return [
            'msg' => 'Failed to update Our Result.',
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
             if (file_exists_view(Config::get('DocumentConstant.OUR_RESULT_DELETE') . $gallery->image)) {
                removeImage(Config::get('DocumentConstant.OUR_RESULT_DELETE') . $gallery->image);
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