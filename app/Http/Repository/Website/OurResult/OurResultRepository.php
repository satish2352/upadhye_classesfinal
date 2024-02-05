<?php
namespace App\Http\Repository\Website\OurResult;

use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
use Session;
use App\Models\ {
    OurResult,
    OurResultCategory,

};
use Config;
class OurResultRepository  {

    public function getAllGalleryAvailableCategories()
    {
        try {
            $data_output = OurResultCategory::where('is_active','=',true);
            $data_output =  $data_output->select('id','title');
           
            $data_output =  $data_output->get()->toArray();
            return  $data_output;
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function getAllGalleryMain($request) {
        try {
            $return_data =[];
            $gallery_data_final = [];
            $query = OurResult::where('is_active', true);
            if($request->category_id) {
                $query->where('category_id','=', $request->category_id);
            }

            $gallery_data = $query->get()->toArray();
            foreach ($gallery_data as $key => $value) {
                $data_gallary = [];
                $data_gallary['image'] = Config::get('DocumentConstant.GALLERY_MAIN_VIEW').$value['image'];
                $data_gallary['category_id'] = $value['category_id'];               
                
                array_push($gallery_data_final,$data_gallary);
            }
            $categories = $this->getAllGalleryAvailableCategories();
            $return_data['gallery_data'] = $gallery_data_final;
            $return_data['categories'] = $categories;
            return $return_data;
        } catch (\Exception $e) {
            return $e;
        }
    }

    
}