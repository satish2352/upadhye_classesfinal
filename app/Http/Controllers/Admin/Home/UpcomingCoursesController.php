<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Admin\Home\UpcomingCoursesServices;
use Session;
use Validator;
use Config;
class UpcomingCoursesController extends Controller
{
    public function __construct(){
        $this->service = new UpcomingCoursesServices();
        }
        public function index(){
            try {
                $getOutput = $this->service->getAll();
                return view('admin.pages.home.upcoming-courses.list-upcoming-courses', compact('getOutput'));
            } catch (\Exception $e) {
                return $e;
            }
        }    
        public function add(){
            return view('admin.pages.home.upcoming-courses.add-upcoming-courses');
        }
        public function store(Request $request){
            $rules = [
                'title' => 'required',
                'description' => 'required',
                'start_date' => 'required',
                'duration' => 'required',
                'test_mode' => 'required',
                'test_medium' => 'required',
                'course_fess' => 'required',
               
            ];
            $messages = [    
                'title.required'=>'Please enter title.',
                'description.required'=>'Please enter description.',
                'start_date.required'=>'Please enter start date.',
                'duration.required'=>'Please enter duration.',
                'test_mode.required'=>'Please select test mode.',
                'test_medium.required'=>'Please select test medium.',
                'course_fess.required'=>'Please enter course fess.',
              
            ];
    
            try {
                $validation = Validator::make($request->all(), $rules, $messages);
                
                if ($validation->fails()) {
                    return redirect('add-upcoming-courses')
                        ->withInput()
                        ->withErrors($validation);
                } else {
                    $add_record = $this->service->addAll($request);
    
                    if ($add_record) {
                        $msg = $add_record['msg'];
                        $status = $add_record['status'];
    
                        if ($status == 'success') {
                            return redirect('list-upcoming-courses')->with(compact('msg', 'status'));
                        } else {
                            return redirect('add-upcoming-courses')->withInput()->with(compact('msg', 'status'));
                        }
                    }
                }
            } catch (Exception $e) {
                return redirect('add-upcoming-courses')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
            }
        }
        public function show(Request $request){
            try {
                $showData = $this->service->getById($request->show_id);
                return view('admin.pages.home.upcoming-courses.show-upcoming-courses', compact('showData'));
            } catch (\Exception $e) {
                return $e;
            }
        }
        public function edit(Request $request){
            $edit_data_id = base64_decode($request->edit_id);
            $editData = $this->service->getById($edit_data_id);
            return view('admin.pages.home.upcoming-courses.edit-upcoming-courses', compact('editData'));
        }
        public function update(Request $request){
            $rules = [
                'title' => 'required',
                'description' => 'required',
                'start_date' => 'required',
                'duration' => 'required',
                'test_mode' => 'required',
                'test_medium' => 'required',
                'course_fess' => 'required',
                
            ];
               
            $messages = [   
                'title.required'=>'Please enter title.',
                'description.required'=>'Please enter description.',
                'start_date.required'=>'Please enter start date.',
                'duration.required'=>'Please enter duration.',
                'test_mode.required'=>'Please select test mode.',
                'test_medium.required'=>'Please select test medium.',
                'course_fess.required'=>'Please enter course fess.',
               
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
                            return redirect('list-upcoming-courses')->with(compact('msg', 'status'));
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
                return redirect('list-upcoming-courses')->with('flash_message', 'Updated!');  
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
                        return redirect('list-upcoming-courses')->with(compact('msg', 'status'));
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
