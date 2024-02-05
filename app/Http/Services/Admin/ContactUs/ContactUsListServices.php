<?php
namespace App\Http\Services\Admin\ContactUs;
use App\Http\Repository\Admin\ContactUs\ContactUsListRepository;
use Carbon\Carbon;

class ContactUsListServices
{
	protected $repo;  
    public function __construct(){
        $this->repo = new ContactUsListRepository();
    }
    public function getAll(){
        try {
            return $this->repo->getAll();
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