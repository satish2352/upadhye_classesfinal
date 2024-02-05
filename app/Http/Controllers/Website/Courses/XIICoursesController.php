<?php

namespace App\Http\Controllers\Website\Courses;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class XIICoursesController extends Controller
{
    public function getProgressivebatch()
    {
        try {
            return view('website.pages.courses.XIIscience.progressivebatch');

        } catch (\Exception $e) {
            return $e;
        }
    }
    public function getIntensivebatch()
    {
        try {
            return view('website.pages.courses.XIIscience.intensivebatch');

        } catch (\Exception $e) {
            return $e;
        }
    }
    public function getIitjeebatchh()
    {
        try {
            return view('website.pages.courses.XIIscience.iitjeebatch');

        } catch (\Exception $e) {
            return $e;
        }
    }
}
