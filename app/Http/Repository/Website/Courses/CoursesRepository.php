<?php
namespace App\Http\Repository\Website\Courses;

use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
use Session;
use App\Models\ {
    CourseModel,
    CourseDetailsModel

};
use Config;
class CoursesRepository  {
public function getById($id){
        try {
            // Using find method
            // $modal_data = CourseModel::find($id);
    
            // Using where clause
            $modal_data = CourseModel::join('course_details', 'course_details.course_id','=', 'courses.id')
                ->select('course_details.*', 'courses.service_name')
                ->where('courses.id', $id)
                ->first(); // Assuming you want to retrieve only one record
    // dd($modal_data);
            return $modal_data;
        } catch (\Exception $e) {
            return $e;
        }
    }
    // public function getById($id) {
    //     try {
    //         $dataOutputById = CourseDetailsModel::join('courses', 'course_details.course_id', '=', 'courses.id')
    //             ->where('course_details.id', $id)
    //             ->where('course_details.is_active', true)
    //             ->select(
    //                 'course_details.id',
    //                 'course_details.courses_type',
    //                 'course_details.courses_duration',
    //                 'course_details.admission_procedure',
    //                 'course_details.eligibility',
    //                 'course_details.course_id',
    //                 'courses.service_name'
    //             )
    //             ->get(); // Use get() instead of first() to get all records
        
    //         if ($dataOutputById->isNotEmpty()) {
    //             return $dataOutputById;
    //         } else {
    //             return null;
    //         }
    //     } catch (\Exception $e) {
    //         return [
    //             'msg' => 'Failed to get by id Data.',
    //             'status' => 'error',
    //             'error' => $e->getMessage()
    //         ];
    //     }
    // }
    
    

    // public function getAllGalleryMain(){
    //     try {
    //         // $data_output = UpcomingCourses::orderBy('updated_at', 'desc')->get();
    //              $data_output = CourseDetailsModel::where('is_active', true)
    //         ->select(
    //             'course_details.id',
    //             'course_details.courses_type',
    //             'course_details.course_id',
    //         )
    //         ->get()
    //         ->toArray();
    //         return $data_output;
    //     } catch (\Exception $e) {
    //         return $e;
    //     }
    // }

    // public function getAllGalleryAvailableCategories()
    // {
    //     try {
    //         $data_output = CourseModel::where('is_active','=',true);
            
    //         $data_output =  $data_output->select('id','service_name');
           
    //         $data_output =  $data_output->get()->toArray();
            
    //         return  $data_output;
    //     } catch (\Exception $e) {
    //         return $e;
    //     }
    // }

    // public function getAllGalleryMain($request) {
    //     try {
    //         $return_data =[];
    //         $gallery_data_final = [];
    //         $query = CourseDetailsModel::where('is_active', true);
    //         if($request->course_id) {
    //             $query->where('course_id','=', $request->course_id);
    //         }

    //         $gallery_data = $query->get()->toArray();
    //         foreach ($gallery_data as $key => $value) {
    //             $data_gallary = [];
    //             // $data_gallary['image'] = Config::get('DocumentConstant.GALLERY_MAIN_VIEW').$value['image'];
    //             $data_gallary['course_id'] = $value['course_id'];               
                
    //             array_push($gallery_data_final,$data_gallary);
    //         }
    //         $categories = $this->getAllGalleryAvailableCategories();
    //         $return_data['gallery_data'] = $gallery_data_final;
    //         $return_data['categories'] = $categories;
    //         return $return_data;
    //     } catch (\Exception $e) {
    //         return $e;
    //     }
    // }

    
}