<?php
namespace App\Http\Repository\Admin\OurResult;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	OurResultCategory
};

class OurResultCategoryRepository  {
    public function getAll(){
        try {
            $data_output = OurResultCategory::orderBy('updated_at', 'desc')->get();
            return $data_output;
        } catch (\Exception $e) {
            return $e;
        }
    }

	
	public function addAll($request)
{
    try {
        $gallery_category = new OurResultCategory();
        $gallery_category->title = $request['title'];
        $gallery_category->save();       
         
		return $gallery_category;

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
        $gallery_category = OurResultCategory::find($id);
        if ($gallery_category) {
            return $gallery_category;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
		return [
            'msg' => 'Failed to get by id documents.',
            'status' => 'error'
        ];
    }
}

public function updateAll($request)
{
    try {
        $update_gallery_category = OurResultCategory::find($request->id);
        
        if (!$update_gallery_category) {
            return [
                'msg' => 'Our Result Category data not found.',
                'status' => 'error'
            ];
        }
       // Store the previous image names
        $update_gallery_category->title = $request['title'];
       
        $update_gallery_category->save();        
     
        return [
            'msg' => 'Our Result Category data updated successfully.',
            'status' => 'success'
        ];
    } catch (\Exception $e) {
        return $e;
        return [
            'msg' => 'Failed to update Our Result Category data.',
            'status' => 'error'
        ];
    }
}
public function updateOne($request)
{
    try {
        $gallery_category = OurResultCategory::find($request); // Assuming $request directly contains the ID

        // Assuming 'is_active' is a field in the Gallery Categoryr model
        if ($gallery_category) {
            $is_active = $gallery_category->is_active === 1 ? 0 : 1;
            $gallery_category->is_active = $is_active;
            $gallery_category->save();

            return [
                'msg' => 'Our Result Category updated successfully.',
                'status' => 'success'
            ];
        }

        return [
            'msg' => 'Our Result Category not found.',
            'status' => 'error'
        ];
    } catch (\Exception $e) {
        return [
            'msg' => 'Failed to update Our Result Category.',
            'status' => 'error'
        ];
    }
}

public function deleteById($id)
{
    try {
        $gallery_category = OurResultCategory::destroy($id);
        if ($gallery_category) {
            return $gallery_category;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
		return [
            'msg' => 'Failed to delete Our Result Category.',
            'status' => 'error'
        ];
    }

}   
}