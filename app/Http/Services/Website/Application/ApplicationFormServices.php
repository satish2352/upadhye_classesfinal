<?php
namespace App\Http\Services\Website\Application;

use App\Http\Repository\Website\Application\ApplicationFormRepository;

// use App\Marquee;
use Carbon\Carbon;


class ApplicationFormServices
{

	protected $repo;

    /**
     * TopicService constructor.
     */
    public function __construct()
    {
        $this->repo = new ApplicationFormRepository();
    }
    public function addApplicationform($request){
        try {
            $last_id = $this->repo->addApplicationform($request);
         
            if ($last_id) {
                return ['status' => 'success', 'msg' => 'Added Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Not Added.'];
            }  
        } catch (Exception $e) {
            return ['status' => 'error', 'msg' => $e->getMessage()];
        }      
    }
    
     
}