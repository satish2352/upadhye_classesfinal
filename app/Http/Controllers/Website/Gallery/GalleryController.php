<?php

namespace App\Http\Controllers\Website\Gallery;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\Website\Gallery\GalleryServices;
// use App\Http\Services\LoginRegister\LoginService;
use Session;

// use App\Models\ {
// };

class GalleryController extends Controller
{
    public function __construct()
    {
        // self::$loginServe = new LoginService();
        $this->service = new GalleryServices();
    }
    
    public function getAllGallery()
    {
        try {

            $menu = $this->menu;
            $data_output = $this->service->getAllGallery();
        } catch (\Exception $e) {
            return $e;
        }
        return view('website.pages.gallery.gallery',compact('data_output'));
    }  
}
