<?php
namespace App\Http\Services\Website\Application;

use App\Http\Repository\Website\Application\ScolarshipFormRepository;

// use App\Marquee;
use Carbon\Carbon;


class ScolarshipFormServices
{

	protected $repo;

    /**
     * TopicService constructor.
     */
    public function __construct()
    {
        $this->repo = new ScolarshipFormRepository();
    }
    public function addScolarshipForm($request){
        try {
            $last_id = $this->repo->addScolarshipForm($request);
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