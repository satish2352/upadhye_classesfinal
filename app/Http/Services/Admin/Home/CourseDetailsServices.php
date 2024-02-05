<?php
namespace App\Http\Services\Admin\Home;
use App\Http\Repository\Admin\Home\CourseDetailsRepository;
use Carbon\Carbon;
use App\Models\ {
    CourseDetailsModel
    };

use Config;
class CourseDetailsServices
{
	protected $repo;
    public function __construct(){
        $this->repo = new CourseDetailsRepository();
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
            // dd($last_id);
            // die();
            // $path = Config::get('DocumentConstant.ADDITIONAL_SOLUTIONS_ADD');
            // $ImageName = $last_id['ImageName'];
            // uploadImage($request, 'image', $path, $ImageName);
            // dd($last_id);
            if ($last_id) {
                return ['status' => 'success', 'msg' => 'Data Added Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => ' Data Not Added.'];
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
            if ($return_data) {
                return ['status' => 'success', 'msg' => 'Course Details Updated Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Course Details  Not Updated.'];
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