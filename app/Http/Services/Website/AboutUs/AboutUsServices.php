<?php
namespace App\Http\Services\Website\AboutUs;

use App\Http\Repository\Website\AboutUs\AboutUsRepository;

// use App\Marquee;
use Carbon\Carbon;


class AboutUsServices
{

	protected $repo;

    /**
     * TopicService constructor.
     */
    public function __construct()
    {
        $this->repo = new AboutusRepository();
    }
    public function getAllDisasterManagmentPortal()
    {
        try {
            return $this->repo->getAllDisasterManagmentPortal();
        } catch (\Exception $e) {
            return $e;
        }
    } 
    
    public function getAllObjectiveGoals()
    {
        try {
            return $this->repo->getAllObjectiveGoals();
        } catch (\Exception $e) {
            return $e;
        }
    } 
    public function getAllStateDisasterManagementAuthority()
    {
        try {
            return $this->repo->getAllStateDisasterManagementAuthority();
        } catch (\Exception $e) {
            return $e;
        }
    }   
    
    public function getAllGallery()
    {
        try {
            return $this->repo->getAllGallery();
        } catch (\Exception $e) {
            return $e;
        }
    }   
}