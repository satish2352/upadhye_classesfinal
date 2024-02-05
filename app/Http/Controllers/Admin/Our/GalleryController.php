<?php

namespace App\Http\Controllers\Admin\Our;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GalleryMain;
use App\Http\Services\Admin\Our\GalleryServices;
use App\Http\Services\Admin\Our\GalleryCategoryServices;
use Validator;
use Config;
class GalleryController extends Controller
{

   public function __construct()
    {
        $this->service = new GalleryServices();
        $this->servicecategory = new GalleryCategoryServices();
    }
    public function index()
    {
        try {
            $gallerymain = $this->service->getAll();
            // dd($gallerymain);
            // die();
            return view('admin.pages.our.gallery.list-gallery-main', compact('gallerymain'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function add()
    {
        $category_gallery = $this->servicecategory->getAll();
        return view('admin.pages.our.gallery.add-gallery-main', compact('category_gallery'));

        return view('admin.pages.our.gallery.add-gallery-main');
    }

    public function store(Request $request) {
        $rules = [
            'category_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:'.Config::get("AllFileValidation.GALLERY_MAIN_IMAGE_MAX_SIZE").'|dimensions:min_width=500,min_height=500,max_width=2000,max_height=2000|min:'.Config::get("AllFileValidation.GALLERY_MAIN_IMAGE_MIN_SIZE").'',
                
            
         ];
    $messages = [   
        'category_id.required' => 'Please select category.',
        'image.required' => 'The image is required.',
        'image.image' => 'The image must be a valid image file.',
        'image.mimes' => 'The image must be in JPEG, PNG, JPG format.',
        'image.max' => 'The image size must not exceed '.Config::get("AllFileValidation.GALLERY_MAIN_IMAGE_MAX_SIZE").'KB .',
        'image.min' => 'The image size must not be less than '.Config::get("AllFileValidation.GALLERY_MAIN_IMAGE_MIN_SIZE").'KB .',
        'image.dimensions' => 'The image dimensions must be between 500x500 and 2000x2000 pixels.',
      
    ];
    

    try {
        $validation = Validator::make($request->all(),$rules,$messages);
        if($validation->fails() )
        {
            return redirect('add-gallery-main')
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
                    return redirect('list-gallery-main')->with(compact('msg','status'));
                }
                else {
                    return redirect('add-gallery-main')->withInput()->with(compact('msg','status'));
                }
            }

        }
    } catch (Exception $e) {
        return redirect('add-gallery-main')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
    }
}
    
    public function edit(Request $request)
    {
        $edit_data_id = base64_decode($request->edit_id);
        $gallery = $this->service->getById($edit_data_id);
        return view('admin.pages.our.gallery.edit-gallery-main', compact('gallery'));
    }
    public function update(Request $request)
{
    $rules = [
        // 'category_id' => 'required',
     ];
     if($request->has('image')) {
        $rules['image'] = 'required|image|mimes:jpeg,png,jpg|max:'.Config::get("AllFileValidation.GALLERY_MAIN_IMAGE_MAX_SIZE").'|dimensions:min_width=500,min_height=500,max_width=2000,max_height=2000|min:'.Config::get("AllFileValidation.GALLERY_MAIN_IMAGE_MIN_SIZE");
    }
    if($request->has('marathi_image')) {
        $rules['marathi_image'] = 'required|image|mimes:jpeg,png,jpg|max:'.Config::get("AllFileValidation.GALLERY_MAIN_IMAGE_MAX_SIZE").'|dimensions:min_width=500,min_height=500,max_width=2000,max_height=2000|min:'.Config::get("AllFileValidation.GALLERY_MAIN_IMAGE_MIN_SIZE");
    }
    $messages = [   
        // 'category_id.required' => 'Please select category.',
        'image.required' => 'The image is required.',
        'image.image' => 'The image must be a valid image file.',
        'image.mimes' => 'The image must be in JPEG, PNG, JPG format.',
        'image.max' => 'The image size must not exceed '.Config::get("AllFileValidation.GALLERY_MAIN_IMAGE_MAX_SIZE").'KB .',
        'image.min' => 'The image size must not be less than '.Config::get("AllFileValidation.GALLERY_MAIN_IMAGE_MIN_SIZE").'KB .',
        'image.dimensions' => 'The image dimensions must be between 500x500 and 2000x2000 pixels.',
       
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
                    return redirect('list-gallery-main')->with(compact('msg', 'status'));
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
            return view('admin.pages.our.gallery.show-gallery-main', compact('gallery'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function updateOne(Request $request)
    {
        try {
            $active_id = $request->active_id;
        $result = $this->service->updateOne($active_id);
            return redirect('list-gallery-main')->with('flash_message', 'Updated!');  
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
                    return redirect('list-gallery-main')->with(compact('msg', 'status'));
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