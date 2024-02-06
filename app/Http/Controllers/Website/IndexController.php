<?php
namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\Website\IndexServices;


use Session;
use Validator;
use App\Models\ {
    LocationAddress,
    EducationBoard,
    EducationClass,
    MarqueeTab,
    CourseDetailsModel,
    CourseModel

};

class IndexController extends Controller
{
    public function __construct()
    {
        $this->service = new IndexServices();  
    }
    public function index(Request $request)
    {
        try {
            $data_output_slider = $this->service->getAllSlider();
            $data_output_courses_offered = $this->service->getAllCoursesOffered();
            $data_output_upcoming_courses = $this->service->getAllUpcomingCourses();
            $data_output_testimonial = $this->service->getAllTestimonial();
            $galleryData = $this->service->getAllMarquee($request);
            $gallery_data = $galleryData['gallery_data'];
            $categories = $galleryData['categories'];
            // print_r($gallery_data);
            // die();
         
            return view('website.pages.index', compact('data_output_slider','data_output_courses_offered','data_output_upcoming_courses',
            'data_output_testimonial','gallery_data',
            'categories'));
        } catch (\Exception $e) {
            return $e;
        }
    }

    // public function getOurresult(Request $request) {
    //     try {
          
    //         $galleryData = $this->service->getAllGalleryMain($request);
    //         $gallery_data = $galleryData['gallery_data'];
    //         $categories = $galleryData['categories'];
           

    //     } catch (\Exception $e) {
    //         return $e;
    //     }
    //     return view('website.pages.ourresult.ourresult',compact('gallery_data', 'categories'));
    // }


    public function getAllAjaxMultimedia(Request $request) {
        $return_data = $this->service->getAllMaequee($request);
        return $return_data['gallery_data'];
    }
    static function getCommonFormData() {
        try {
            $retun_data = [];
            $data_output_location_address = LocationAddress::where('is_active', true)
            ->select(
                'location_address.name',
                'location_address.id'
            )
            ->get()
            ->toArray();

        $retun_data['data_output_location_address'] = $data_output_location_address;

            $data_output_all_board = EducationBoard::where('is_active', true)
                ->select(
                    'education_board.name',
                    'education_board.id'
                )
                ->get()
                ->toArray();
    
            $retun_data['data_output_all_board'] = $data_output_all_board;
    
            $data_output_all_class = EducationClass::where('is_active', true)
                ->select(
                    'education_class.name',
                    'education_class.id'
                )
                ->get()
                ->toArray();
    
            $retun_data['data_output_all_class'] = $data_output_all_class;
            
            $data_output_marquee_tab = MarqueeTab::where('is_active', true)
                ->select(
                    'marquee_tab.title',
                    'marquee_tab.id'
                )
                ->get()
                ->toArray();
    
            $retun_data['data_output_marquee_tab'] = $data_output_marquee_tab;
            
            $data_output_courses = CourseModel::where('is_active', true)
           ->select('id', 'service_name')
           ->get()
           ->toArray();
       $retun_data['data_output_courses'] = $data_output_courses;
            return $retun_data;
        } catch (\Exception $e) {
            // Log the error for debugging
            \Log::error($e);
    
            // Return an error response
            return ['error' => 'An error occurred while fetching data. Please try again later.'];
        }
    }
    
    // ================
    // public function showParticularCourseDetails(Request $request)
    // {
    //     try {
           
              
    //         $data_output = $this->service->showParticularCourseDetails($request->show_detail_id);
    //         // dd($data_output);
    //         // die();
    //         return view('website.pages.subpages.course-details', compact('data_output'));

    //     } catch (\Exception $e) {
    //         return $e;
    //     }
    // } 

    public function showParticularCourseDetails(Request $request)
    {
        try {
            $id = $request->input('show_detail_id'); // Assuming the parameter is passed as 'show_detail_id'
            $data_output = $this->service->showParticularCourseDetails($id);
            // Check if data is retrieved
            if ($data_output !== null) {
                return view('website.pages.subpages.course-details', compact('data_output'));
            } else {
                return response()->json(['error' => 'Course details not found.'], 404);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while fetching course details.'], 500);
        }
    }

    // public function showParticularCourseDetails(Request $request)
    // {
    //     try {
    //         $new=$request->show_detail_id;
            
    //         $data_output = $this->service->showParticularCourseDetails($new);
    //         dd($data_output);
    //         die();

    //     } catch (\Exception $e) {
    //         return $e;
    //     }
    //     return view('website.pages.subpages.course-details',compact('data_output'));
    // }

    public function showParticularUpcomingCourseDetailsDetails()
    {
        try {
            $data_output = $this->service->showParticularUpcomingCourseDetailsDetails();

        } catch (\Exception $e) {
            return $e;
        }
        return view('website.pages.subpages.upcoming-course-details',compact('data_output'));
    }
}
