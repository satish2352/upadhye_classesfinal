<?php
namespace App\Http\Services\Website\Courses;

use App\Http\Repository\Website\Courses\CoursesRepository;

// use App\Marquee;
use Carbon\Carbon;

class CoursesServices
{

	protected $repo;

    /**
     * TopicService constructor.
     */
    public function __construct()
    {
        $this->repo = new CoursesRepository();
    }
    

    // public function getAllGalleryMain(){
    //     try {
    //         return $this->repo->getAllGalleryMain();
    //     } catch (\Exception $e) {
    //         return $e;
    //     }
    // }

    public function getById($id){
        try {
            return $this->repo->getById($id);
        } catch (\Exception $e) {
            return $e;
        }
    }
}