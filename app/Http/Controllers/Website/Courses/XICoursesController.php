<?php

namespace App\Http\Controllers\Website\Courses;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class XICoursesController extends Controller
{
    public function getProgressivebatch()
    {
        try {
            return view('website.pages.courses.XIscience.progressivebatch');

        } catch (\Exception $e) {
            return $e;
        }
    }
    public function getIntensivebatch()
    {
        try {
            return view('website.pages.courses.XIscience.intensivebatch');

        } catch (\Exception $e) {
            return $e;
        }
    }
    public function getIitjeebatchh()
    {
        try {
            return view('website.pages.courses.XIscience.iitjeebatch');

        } catch (\Exception $e) {
            return $e;
        }
    }
}
