<?php
namespace App\Http\Repository\Admin\Our;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	OurResultCategory
};

class GalleryCategoryRepository  {
    public function getAll()
    {
        try {
            return OurResultCategory::orderBy('id', 'desc')->get();
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
                'msg' => 'Gallery Category data not found.',
                'status' => 'error'
            ];
        }
       // Store the previous image names
        $update_gallery_category->title = $request['title'];
       
        $update_gallery_category->save();        
     
        return [
            'msg' => 'Gallery Category data updated successfully.',
            'status' => 'success'
        ];
    } catch (\Exception $e) {
        return $e;
        return [
            'msg' => 'Failed to update Gallery Category data.',
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
                'msg' => 'Gallery Category updated successfully.',
                'status' => 'success'
            ];
        }

        return [
            'msg' => 'Gallery Category not found.',
            'status' => 'error'
        ];
    } catch (\Exception $e) {
        return [
            'msg' => 'Failed to update Gallery Category.',
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
            'msg' => 'Failed to delete Gallery Category.',
            'status' => 'error'
        ];
    }

}   
}