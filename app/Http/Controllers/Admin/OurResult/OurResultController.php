<?php

namespace App\Http\Controllers\Admin\OurResult;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OurResult;
use App\Http\Services\Admin\OurResult\OurResultServices;
use App\Http\Services\Admin\OurResult\OurResultCategoryServices;
use Validator;
use Config;
class OurResultController extends Controller
{

   public function __construct()
    {
        $this->service = new OurResultServices();
        $this->servicecategory = new OurResultCategoryServices();
    }
    public function index()
    {
        try {
            $gallery = $this->service->getAll();
            return view('admin.pages.ourresult.ourresult.list-ourresult', compact('gallery'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function add()
    {
        $category_gallery = $this->servicecategory->getAll();
        return view('admin.pages.ourresult.ourresult.add-ourresult', compact('category_gallery'));

        return view('admin.pages.ourresult.ourresult.add-ourresult');
    }

    public function store(Request $request) {
        $rules = [
            'category_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:'.Config::get("AllFileValidation.OUR_RESULT_IMAGE_MAX_SIZE").'|dimensions:min_width=200,min_height=200,max_width=1800,max_height=1800|min:'.Config::get("AllFileValidation.OUR_RESULT_IMAGE_MIN_SIZE").'',
                
            
         ];
    $messages = [   
        'category_id.required' => 'Please select category.',
        'image.required' => 'The image is required.',
        'image.image' => 'The image must be a valid image file.',
        'image.mimes' => 'The image must be in JPEG, PNG, JPG format.',
        'image.max' => 'The image size must not exceed '.Config::get("AllFileValidation.OUR_RESULT_IMAGE_MAX_SIZE").'KB .',
        'image.min' => 'The image size must not be less than '.Config::get("AllFileValidation.OUR_RESULT_IMAGE_MIN_SIZE").'KB .',
        'image.dimensions' => 'The image dimensions must be between 200x200 and 1800x1800 pixels.',
    ];
    

    try {
        $validation = Validator::make($request->all(),$rules,$messages);
        if($validation->fails() )
        {
            return redirect('add-ourresult')
                ->withInput()
                ->withErrors($validation);
        }
        else
        {
            $add_gallery = $this->service->addAll($request);
            if($add_gallery)
            {

                $msg = $add_gallery['msg'];
                $status = $add_gallery['status'];
                if($status=='success') {
                    return redirect('list-ourresult')->with(compact('msg','status'));
                }
                else {
                    return redirect('add-ourresult')->withInput()->with(compact('msg','status'));
                }
            }

        }
    } catch (Exception $e) {
        return redirect('add-ourresult')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
    }
}
    
    public function edit(Request $request)
    {
        $edit_data_id = base64_decode($request->edit_id);
        $gallery = $this->service->getById($edit_data_id);
        return view('admin.pages.ourresult.ourresult.edit-ourresult', compact('gallery'));
    }
    public function update(Request $request)
{
    $rules = [
        // 'category_id' => 'required',
     ];
     if($request->has('image')) {
        $rules['image'] = 'required|image|mimes:jpeg,png,jpg|max:'.Config::get("AllFileValidation.OUR_RESULT_IMAGE_MAX_SIZE").'|dimensions:min_width=200,min_height=200,max_width=1800,max_height=1800:'.Config::get("AllFileValidation.OUR_RESULT_IMAGE_MIN_SIZE");
    }
   
    $messages = [   
        // 'category_id.required' => 'Please select category.',
        'image.required' => 'The image is required.',
        'image.image' => 'The image must be a valid image file.',
        'image.mimes' => 'The image must be in JPEG, PNG, JPG format.',
        'image.max' => 'The image size must not exceed '.Config::get("AllFileValidation.OUR_RESULT_IMAGE_MAX_SIZE").'KB .',
        'image.min' => 'The image size must not be less than '.Config::get("AllFileValidation.OUR_RESULT_IMAGE_MIN_SIZE").'KB .',
        'image.dimensions' => 'The image dimensions must be between 200x200 and 1800x1800 pixels.',
    ];

    try {
        $validation = Validator::make($request->all(),$rules, $messages);
        if ($validation->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validation);
        } else {
            $update_gallery = $this->service->updateAll($request);
           
            if ($update_gallery) {
                $msg = $update_gallery['msg'];
                $status = $update_gallery['status'];
                if ($status == 'success') {
                    return redirect('list-ourresult')->with(compact('msg', 'status'));
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
public function show(Request $request)
    {
        try {
            $gallery = $this->service->getById($request->show_id);
            return view('admin.pages.ourresult.ourresult.show-ourresult', compact('gallery'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function updateOne(Request $request)
    {
        try {
            $active_id = $request->active_id;
        $result = $this->service->updateOne($active_id);
            return redirect('list-ourresult')->with('flash_message', 'Updated!');  
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function destroy(Request $request){
        try {
            $delete = $this->service->deleteById($request->delete_id);
            if ($delete) {
                $msg = $delete['msg'];
                $status = $delete['status'];
                if ($status == 'success') {
                    return redirect('list-ourresult')->with(compact('msg', 'status'));
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