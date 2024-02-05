<?php
namespace App\Http\Services\Admin\Home;
use App\Http\Repository\Admin\Home\UpcomingCoursesRepository;
use Carbon\Carbon;
// use App\Helpers\helpercustom; // Import the namespace of your helper file

use Config;
class UpcomingCoursesServices
{
	protected $repo;
    public function __construct(){
        $this->repo = new UpcomingCoursesRepository();
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
            if ($last_id) {
                return ['status' => 'success', 'msg' => 'Upcoming Courses Added Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => ' Upcoming Courses get Not Added.'];
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
                return ['status' => 'success', 'msg' => 'Upcoming Courses Updated Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Upcoming Courses  Not Updated.'];
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