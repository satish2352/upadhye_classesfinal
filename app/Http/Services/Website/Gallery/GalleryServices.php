<?php
namespace App\Http\Services\Website\Gallery;

use App\Http\Repository\Website\Gallery\GalleryRepository;

// use App\Marquee;
use Carbon\Carbon;

class GalleryServices
{

	protected $repo;

    /**
     * TopicService constructor.
     */
    public function __construct()
    {
        $this->repo = new GalleryRepository();
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