<?php

namespace App\Http\Controllers\Admin\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use App\Http\Services\DashboardServices;
use App\Models\ {
    User,
    Slider,
    CoursesOffered,
   Gallery,
    Testimonial,
    GalleryCategory,
    GalleryMain,
    UpcomingCourses,
    ApplicationForm,
    FessPaymentForm,
    Scolarship,
    ContactUs
};
use Validator;

class DashboardController extends Controller {
    /**
     * Topic constructor.
     */
    public function __construct()
    {
        // $this->service = new DashboardServices();
    }

    public function index()
    {
        $return_data = array();
        $return_data['slider'] = count(Slider::where('is_active',true)->orderBy('updated_at', 'desc')->get());
        $return_data['coursesOffered'] = count(CoursesOffered::where('is_active',true)->orderBy('updated_at', 'desc')->get());
        // $return_data['courses'] = count(Courses::where('is_active',true)->orderBy('updated_at', 'desc')->get());
        $return_data['gallary'] = count(Gallery::where('is_active',true)->orderBy('updated_at', 'desc')->get());
        $return_data['galleryCategory'] = count(GalleryCategory::where('is_active',true)->orderBy('updated_at', 'desc')->get());
        $return_data['galleryMain'] = count(GalleryMain::where('is_active',true)->orderBy('updated_at', 'desc')->get());
        $return_data['testimonial'] = count(Testimonial::where('is_active',true)->orderBy('updated_at', 'desc')->get());
        $return_data['upcomingCourses'] = count(UpcomingCourses::where('is_active',true)->orderBy('updated_at', 'desc')->get());
        $return_data['applicationForm'] = count(ApplicationForm::where('is_active',true)->orderBy('updated_at', 'desc')->get());
        $return_data['fessPaymentForm'] = count(FessPaymentForm::where('is_active',true)->orderBy('updated_at', 'desc')->get());
        $return_data['scolarship'] = count(Scolarship::where('is_active',true)->orderBy('updated_at', 'desc')->get());
        $return_data['contactUs'] = count(ContactUs::where('is_active',true)->orderBy('updated_at', 'desc')->get());

        return view('admin.pages.dashboard',compact('return_data'));
    }



}