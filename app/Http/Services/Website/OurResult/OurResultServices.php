<?php
namespace App\Http\Services\Website\OurResult;

use App\Http\Repository\Website\OurResult\OurResultRepository;

// use App\Marquee;
use Carbon\Carbon;

class OurResultServices
{

	protected $repo;

    /**
     * TopicService constructor.
     */
    public function __construct()
    {
        $this->repo = new OurResultRepository();
    }
      public function getAllGalleryMain($request)
    {
        try {
            return $this->repo->getAllGalleryMain($request);
        } catch (\Exception $e) {
            return $e;
        }
    } 
}