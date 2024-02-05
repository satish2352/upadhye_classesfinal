<?php
namespace App\Http\Services\Admin\Application;
use App\Http\Repository\Admin\Application\ApplicationListRepository;
use Carbon\Carbon;

class ApplicationListServices
{
	protected $repo;
    public function __construct(){
        $this->repo = new ApplicationListRepository();
    }
    public function getAllApplicationForm(){
        try {
            return $this->repo->getAllApplicationForm();
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function getById($id){
        try {
            return $this->repo->getById($id);
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function deleteById($id){
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