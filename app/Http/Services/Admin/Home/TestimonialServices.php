<?php
namespace App\Http\Services\Admin\Home;

use App\Http\Repository\Admin\Home\TestimonialRepository;

use App\Models\
{ Testimonial };
use Carbon\Carbon;
use Config;
use Storage;

class TestimonialServices
{

	protected $repo;

    /**
     * TopicService constructor.
     */
    public function __construct()
    {
        $this->repo = new TestimonialRepository();
    }
    
    public function getAll(){
        try {
            return $this->repo->getAll();
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function addAll($request){
        try {
            $last_id = $this->repo->addAll($request);
            $path = Config::get('DocumentConstant.TESTIMONIAL_ADD');
            $ImageName = $last_id['ImageName'];
            uploadImage($request, 'image', $path, $ImageName);
           
            if ($last_id) {
                return ['status' => 'success', 'msg' => 'Courses Offered Added Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => ' Courses Offered get Not Added.'];
            }  
        } catch (Exception $e) {
            return ['status' => 'error', 'msg' => $e->getMessage()];
        }      
    }
    public function getById($id){
        try {
            return $this->repo->getById($id);
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function updateAll($request){
        try {
            $return_data = $this->repo->updateAll($request);
            
            $path = Config::get('DocumentConstant.TESTIMONIAL_ADD');
            if ($request->hasFile('image')) {
                if ($return_data['image']) {
                    if (file_exists_view(Config::get('DocumentConstant.TESTIMONIAL_DELETE') . $return_data['image'])) {
                        removeImage(Config::get('DocumentConstant.TESTIMONIAL_DELETE') . $return_data['image']);
                    }

                }
                $englishImageName = $return_data['last_insert_id'] . '_' . rand(100000, 999999) . '_image.' . $request->file('image')->extension();
                uploadImage($request, 'image', $path, $englishImageName);
                $slide_data = Testimonial::find($return_data['last_insert_id']);
                $slide_data->image = $englishImageName;
                $slide_data->save();
            }
                
            // print_r($return_data);
            // die();
            if ($return_data) {
                return ['status' => 'success', 'msg' => 'Testimonial Updated Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Testimonial  Not Updated.'];
            }  
        } catch (Exception $e) {
            return ['status' => 'error', 'msg' => $e->getMessage()];
        }      
    }
    public function updateOne($id){
        return $this->repo->updateOne($id);
    }   
    public function deleteById($id)
    {
        try {
            $delete = $this->repo->deleteById($id);
            if ($delete) {
                return ['status' => 'success', 'msg' => 'Deleted Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => ' Not Deleted.'];
            }  
        } catch (Exception $e) {
            return ['status' => 'error', 'msg' => $e->getMessage()];
        } 
    }
}