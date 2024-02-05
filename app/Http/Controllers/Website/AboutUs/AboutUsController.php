<?php

namespace App\Http\Controllers\Website\AboutUs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Website\AboutUs\AboutUsServices;
use Session;
use Validator;
use App\Models\ {
    LocationAddress,
    EducationBoard,
    ApplicationForm,
    EducationClass

};

class AboutUsController extends Controller
{
    public function __construct()
    {
        $this->service = new AboutUsServices();
    }
    public function index()
    {
        try {
            // return view('website.pages.aboutus.updadhyeclasses');
            return view('website.pages.aboutus.updadhyeclasses');

        } catch (\Exception $e) {
            return $e;
        }
    }

    public function getDirectordesk()
    {
        try {
            // return view('website.pages.aboutus.updadhyeclasses');
            return view('website.pages.aboutus.directordesk');

        } catch (\Exception $e) {
            return $e;
        }
    }

    public function getTeachingmethodology()
    {
        try {
            // return view('website.pages.aboutus.updadhyeclasses');
            return view('website.pages.aboutus.teachingmethodology');

        } catch (\Exception $e) {
            return $e;
        }
    }
    public function getAllGallery()
    {
        try {
            $data_output = $this->service->getAllGallery();
        } catch (\Exception $e) {
            return $e;
        }
        return view('website.pages.gallery.gallery',compact('data_output'));
    } 
}

