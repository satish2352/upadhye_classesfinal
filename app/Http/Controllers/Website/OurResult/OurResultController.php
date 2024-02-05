<?php

namespace App\Http\Controllers\Website\OurResult;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Website\OurResult\OurResultServices;
// use App\Http\Services\LoginRegister\LoginService;
use Session;

class OurResultController extends Controller
{
    public function __construct()
    {
        $this->service = new OurResultServices();  
    }
    // public function getOurresult()
    // {
    //     try {
    //         return view('website.pages.ourresult.ourresult');

    //     } catch (\Exception $e) {
    //         return $e;
    //     }
    // }


    public function getOurresult(Request $request) {
        try {
          
            $galleryData = $this->service->getAllGalleryMain($request);
            $gallery_data = $galleryData['gallery_data'];
            $categories = $galleryData['categories'];
           

        } catch (\Exception $e) {
            return $e;
        }
        return view('website.pages.ourresult.ourresult',compact('gallery_data', 'categories'));
    }

    public function getAllAjaxMultimedia(Request $request) {
        $return_data = $this->service->getAllGalleryMain($request);
        return $return_data['gallery_data'];
    }
}
