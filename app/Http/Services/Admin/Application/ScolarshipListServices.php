<?php
namespace App\Http\Services\Admin\Application;
use App\Http\Repository\Admin\Application\ScolarshipListRepository;
use Carbon\Carbon;

class ScolarshipListServices
{
	protected $repo;  
    public function __construct(){
        $this->repo = new ScolarshipListRepository();
    }
    public function getAllScolarshipForm(){
        try {
            return $this->repo->getAllScolarshipForm();
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