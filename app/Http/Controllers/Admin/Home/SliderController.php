<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Admin\Home\SliderServices;
use Session;
use Validator;
use Config;
class SliderController extends Controller
{
    public function __construct(){
    $this->service = new SliderServices();
    }
    public function index(){
        try {
            $getOutput = $this->service->getAll();
            return view('admin.pages.home.slider.list-slide', compact('getOutput'));
        } catch (\Exception $e) {
            return $e;
        }
    }    
    public function add(){
        return view('admin.pages.home.slider.add-slide');
    }
    public function store(Request $request){
        $rules = [
            'rank_no' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:'.Config::get("AllFileValidation.SLIDER_IMAGE_MAX_SIZE").'|dimensions:min_width=400,min_height=300,max_width=1500,max_height=1200|min:'.Config::get("AllFileValidation.SLIDER_IMAGE_MIN_SIZE").'',
           
        ];
        $messages = [    
            'rank_no.required'=>'Please enter title.',
            'image.required' => 'The image is required.',
            'image.image' => 'The image must be a valid image file.',
            'image.mimes' => 'The image must be in JPEG, PNG, JPG format.',
            'image.max' => 'The image size must not exceed '.Config::get("AllFileValidation.SLIDER_IMAGE_MAX_SIZE").'KB .',
            'image.min' => 'The image size must not be less than '.Config::get("AllFileValidation.SLIDER_IMAGE_MIN_SIZE").'KB .',
            'image.dimensions' => 'The image dimensions must be between 1500x500 and 2000x1000 pixels.',
        ];

        try {
            $validation = Validator::make($request->all(), $rules, $messages);
            
            if ($validation->fails()) {
                return redirect('add-slide')
                    ->withInput()
                    ->withErrors($validation);
            } else {
                $add_record = $this->service->addAll($request);

                if ($add_record) {
                    $msg = $add_record['msg'];
                    $status = $add_record['status'];

                    if ($status == 'success') {
                        return redirect('list-slide')->with(compact('msg', 'status'));
                    } else {
                        return redirect('add-slide')->withInput()->with(compact('msg', 'status'));
                    }
                }
            }
        } catch (Exception $e) {
            return redirect('add-slide')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
        }
    }
    public function show(Request $request){
        try {
            $showData = $this->service->getById($request->show_id);
            return view('admin.pages.home.slider.show-slide', compact('showData'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function edit(Request $request){
        $edit_data_id = base64_decode($request->edit_id);
        $editData = $this->service->getById($edit_data_id);
        return view('admin.pages.home.slider.edit-slide', compact('editData'));
    }
    public function update(Request $request){
        $rules = [
            'rank_no' => 'required',
            
        ];

        if($request->has('image')) {
            $rules['image'] = 'required|image|mimes:jpeg,png,jpg|max:'.Config::get("AllFileValidation.SLIDER_IMAGE_MAX_SIZE").'|dimensions:min_width=400,min_height=300,max_width=1500,max_height=1200|min:'.Config::get("AllFileValidation.SLIDER_IMAGE_MIN_SIZE");
        }
       
        $messages = [   
            'rank_no.required'=>'Please enter Rank Number.',
            'image.required' => 'The image is required.',
            'image.image' => 'The image must be a valid image file.',
            'image.mimes' => 'The image must be in JPEG, PNG, JPG format.',
            'image.max' => 'The image size must not exceed '.Config::get("AllFileValidation.SLIDER_IMAGE_MAX_SIZE").'KB .',
            'image.min' => 'The image size must not be less than '.Config::get("AllFileValidation.SLIDER_IMAGE_MIN_SIZE").'KB .',
            'image.dimensions' => 'The image dimensions must be between 1500x500 and 2000x1000 pixels.',
           
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
                        return redirect('list-slide')->with(compact('msg', 'status'));
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
          
            return redirect('list-slide')->with('flash_message', 'Updated!');  
        } catch (\Exception $e) {
            return $e;
        }
    }
     public function destroy(Request $request){
        try {
            $delete_slide = $this->service->deleteById($request->delete_id);
            if ($delete_slide) {
                $msg = $delete_slide['msg'];
                $status = $delete_slide['status'];
                if ($status == 'success') {
                    return redirect('list-slide')->with(compact('msg', 'status'));
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