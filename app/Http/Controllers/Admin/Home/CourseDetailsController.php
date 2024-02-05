<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Admin\Home\CourseDetailsServices;
use Session;
use Validator;
use Config;
use App\Models\CourseModel;
use App\Models\CourseDetailsModel;
class CourseDetailsController extends Controller
{ 
    public function __construct(){
        $this->service = new CourseDetailsServices();
        }
        public function index(){
            try {
                $getOutput = $this->service->getAll();
                $combinedData = CourseDetailsModel::join('courses', 'courses.id', '=', 'course_details.course_id')
                        ->select('course_details.*' ,'courses.service_name')
                        ->get();    
                return view('admin.pages.home.course-details.list-course-details', compact('combinedData'));
            } catch (\Exception $e) {
                return $e;
            }
        }    
        public function add(){
            $data=CourseModel::getall();
            
// dd($data);
            return view('admin.pages.home.course-details.add-course-details',compact('data'));
        }
        public function store(Request $request){
            $rules = [
                'courses_type' => 'required',
                'admission_procedure' => 'required',
                // 'eligibility' => 'required',
                'courses_duration' => 'required',
                
            ];
            $messages = [    
                'courses_type.required'=>'Please enter Course Type.',
                'admission_procedure.required' => 'Please  enter Admission Procedure.',
                // 'eligibility.required' => 'Please  enter Eligibility.',
                'courses_duration.required' => 'The Courses Duration is required.',
                
            ];
    
            try {
                $validation = Validator::make($request->all(), $rules, $messages);
                
                if ($validation->fails()) {
                    return redirect('add-course-details')
                        ->withInput()
                        ->withErrors($validation);
                } else {
                    $add_record = $this->service->addAll($request);
    
                    if ($add_record) {
                        $msg = $add_record['msg'];
                        $status = $add_record['status'];
    
                        if ($status == 'success') {
                            return redirect('list-course-details')->with(compact('msg', 'status'));
                        } else {
                            return redirect('add-course-details')->withInput()->with(compact('msg', 'status'));
                        }
                    }
                }
            } catch (Exception $e) {
                return redirect('add-course-details')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
            }
        }
        public function show(Request $request){
            try {
                $showData = $this->service->getById($request->show_id);
                return view('admin.pages.home.course-details.show-course-details', compact('showData'));
            } catch (\Exception $e) {
                return $e;
            }
        }
        public function edit(Request $request){
            $edit_data_id = base64_decode($request->edit_id);
            $editData = $this->service->getById($edit_data_id);
           
            return view('admin.pages.home.course-details.edit-course-details', compact('editData'));
        }
        public function update(Request $request){
            $rules = [
                'courses_type' => 'required',
                'admission_procedure' => 'required',
                // 'eligibility' => 'required',
                'courses_duration' => 'required',            
            ];
               
            $messages = [   
                'courses_type.required'=>'Please enter Course Type.',
                'admission_procedure.required' => 'Please  enter Admission Procedure.',
                // 'eligibility.required' => 'Please  enter Eligibility.',
                'courses_duration.required' => 'The Courses Duration is required.',
            ];
    
            try {
                $validation = Validator::make($request->all(),$rules, $messages);
                if ($validation->fails()) {
                    return redirect()->back()
                        ->withInput()
                        ->withErrors($validation);
                } else {
                    $update_data = $this->service->updateAll($request);
                    if ($update_data) {
                        $msg = $update_data['msg'];
                        $status = $update_data['status'];
                        if ($status == 'success') {
                            return redirect('list-course-details')->with(compact('msg', 'status'));
                        } else {
                            return redirect()->back()
                                ->withInput()
                                ->with(compact('msg', 'status'));
                        }
                    }
                }
            } catch (Exception $e) {
                return redirect()->back()
                    ->withInput()
                    ->with(['msg' => $e->getMessage(), 'status' => 'error']);
            }
        }
        public function updateOne(Request $request){
            try {
                $active_id = $request->active_id;
            $result = $this->service->updateOne($active_id);
                return redirect('list-course-details')->with('flash_message', 'Updated!');  
            } catch (\Exception $e) {
                return $e;
            }
        }
        public function destroy(Request $request){
            try {
                $delete_record = $this->service->deleteById($request->delete_id);
                if ($delete_record) {
                    $msg = $delete_record['msg'];
                    $status = $delete_record['status'];
                    if ($status == 'success') {
                        return redirect('list-course-details')->with(compact('msg', 'status'));
                    } else {
                        return redirect()->back()
                            ->withInput()
                            ->with(compact('msg', 'status'));
                    }
                }
            } catch (\Exception $e) {
                return $e;
            }
        } 
}
