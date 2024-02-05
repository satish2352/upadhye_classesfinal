<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Admin\Home\TestimonialServices;
use Session;
use Validator;
use Config;

class TestimonialController extends Controller
{
    public function __construct(){
        $this->service = new TestimonialServices();
        }
    
        public function index(){
            try {
                $slider = $this->service->getAll();
                return view('admin.pages.home.testimonial.list-testimonial', compact('slider'));
            } catch (\Exception $e) {
                return $e;
            }
        }
    
        public function add(){
            return view('admin.pages.home.testimonial.add-testimonial');
        }
        public function store(Request $request){
            $rules = [
                'title' => 'required',
                'position' => 'required',
                'description' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg|max:'.Config::get("AllFileValidation.TESTIMONIAL_IMAGE_MAX_SIZE").'|dimensions:min_width=50,min_height=50,max_width=800,max_height=800|min:'.Config::get("AllFileValidation.TESTIMONIAL_IMAGE_MIN_SIZE").'',
               
            ];
            $messages = [    
                'title.required'=>'Please enter title.',
                'description.required'=>'Please enter description.',
                'position.required'=>'Please enter position.',
                'image.required' => 'The image is required.',
                'image.image' => 'The image must be a valid image file.',
                'image.mimes' => 'The image must be in JPEG, PNG, JPG format.',
                'image.max' => 'The image size must not exceed '.Config::get("AllFileValidation.TESTIMONIAL_IMAGE_MAX_SIZE").'KB .',
                'image.min' => 'The image size must not be less than '.Config::get("AllFileValidation.TESTIMONIAL_IMAGE_MIN_SIZE").'KB .',
                'image.dimensions' => 'The image dimensions must be between 50x50 and 800x800 pixels.',
            ];
    
            try {
                $validation = Validator::make($request->all(), $rules, $messages);
                
                if ($validation->fails()) {
                    return redirect('add-testimonial')
                        ->withInput()
                        ->withErrors($validation);
                } else {
                    $add_record = $this->service->addAll($request);
    
                    if ($add_record) {
                        $msg = $add_record['msg'];
                        $status = $add_record['status'];
    
                        if ($status == 'success') {
                            return redirect('list-testimonial')->with(compact('msg', 'status'));
                        } else {
                            return redirect('add-testimonial')->withInput()->with(compact('msg', 'status'));
                        }
                    }
                }
            } catch (Exception $e) {
                return redirect('add-testimonial')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
            }
        }
    
        public function show(Request $request){
            try {
                $showData = $this->service->getById($request->show_id);
                return view('admin.pages.home.testimonial.show-testimonial', compact('showData'));
            } catch (\Exception $e) {
                return $e;
            }
        }
        public function edit(Request $request){
            $edit_data_id = base64_decode($request->edit_id);
            $editData = $this->service->getById($edit_data_id);
            return view('admin.pages.home.testimonial.edit-testimonial', compact('editData'));
        }
        public function update(Request $request){
            $rules = [
                'title' => 'required',
                'position' => 'required',
                'description' => 'required',
                
            ];
    
            if($request->has('image')) {
                $rules['image'] = 'required|image|mimes:jpeg,png,jpg|max:'.Config::get("AllFileValidation.TESTIMONIAL_IMAGE_MAX_SIZE").'|dimensions:min_width=50,min_height=50,max_width=800,max_height=800|min:'.Config::get("AllFileValidation.TESTIMONIAL_IMAGE_MIN_SIZE");
            }
           
            $messages = [   
                'rank_no.required'=>'Please enter Title.',
                'description.required'=>'Please enter description.',
                'image.required' => 'The image is required.',
                'image.image' => 'The image must be a valid image file.',
                'image.mimes' => 'The image must be in JPEG, PNG, JPG format.',
                'image.max' => 'The image size must not exceed '.Config::get("AllFileValidation.TESTIMONIAL_IMAGE_MAX_SIZE").'KB .',
                'image.min' => 'The image size must not be less than '.Config::get("AllFileValidation.TESTIMONIAL_IMAGE_MIN_SIZE").'KB .',
                'image.dimensions' => 'The image dimensions must be between 50x50 and 800x800 pixels.',
               
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
                            return redirect('list-testimonial')->with(compact('msg', 'status'));
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
                return redirect('list-testimonial')->with('flash_message', 'Updated!');  
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
                        return redirect('list-testimonial')->with(compact('msg', 'status'));
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
