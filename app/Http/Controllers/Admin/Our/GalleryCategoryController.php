<?php

namespace App\Http\Controllers\Admin\Our;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SuccessStories;
use App\Http\Services\Admin\Our\GalleryCategoryServices;
use Validator;
use Illuminate\Validation\Rule;
class GalleryCategoryController extends Controller
{

   public function __construct()
    {
        $this->service = new GalleryCategoryServices();
    }
    public function index()
    {
        try {
            $success_stories = $this->service->getAll();
            return view('admin.pages.our.gallery-category.list-gallery-category', compact('success_stories'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function add()
    {
        return view('admin.pages.our.gallery-category.add-gallery-category');
    }

    public function store(Request $request) {
        $rules = [
            'title' => 'required|unique:ourresult_category|max:255',
         ];
    $messages = [   
       
        'title.required'=>'Please enter Name.',
        'title.max'   => 'Please  enter text length upto 255 character only.',
        
    ];

    try {
        $validation = Validator::make($request->all(),$rules,$messages);
        if($validation->fails() )
        {
            return redirect('add-gallery-category')
                ->withInput()
                ->withErrors($validation);
        }
        else
        {
            $add_success_stories = $this->service->addAll($request);
         
            // print_r($add_tenders);
            // die();
            if($add_success_stories)
            {

                $msg = $add_success_stories['msg'];
                $status = $add_success_stories['status'];
                if($status=='success') {
                    return redirect('list-gallery-category')->with(compact('msg','status'));
                }
                else {
                    return redirect('add-gallery-category')->withInput()->with(compact('msg','status'));
                }
            }

        }
    } catch (Exception $e) {
        return redirect('add-gallery-category')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
    }
}
    
    public function edit(Request $request)
    {
        $edit_data_id = base64_decode($request->edit_id);
        $success_stories = $this->service->getById($edit_data_id);
        return view('admin.pages.our.gallery-category.edit-gallery-category', compact('success_stories'));
    }
    public function update(Request $request)
{
    $id = $request->input('id'); // Assuming the 'id' value is present in the request

    $rules = [
        'title' => ['required', Rule::unique('ourresult_category', 'title')->ignore($id, 'id')],
    ];

    $messages = [   
        'title.required'=>'Please enter name.',
        'title.max'   => 'Please  enter text length upto 255 character only.',
    ];

    try {
        $validation = Validator::make($request->all(),$rules, $messages);
        if ($validation->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validation);
        } else {
            $update_success_stories = $this->service->updateAll($request);
            if ($update_success_stories) {
                $msg = $update_success_stories['msg'];
                $status = $update_success_stories['status'];
                if ($status == 'success') {
                    return redirect('list-gallery-category')->with(compact('msg', 'status'));
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
            $success_stories = $this->service->getById($request->show_id);
            return view('admin.pages.our.gallery-category.show-gallery-category', compact('success_stories'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function updateOne(Request $request)
    {
        try {
            $active_id = $request->active_id;
        $result = $this->service->updateOne($active_id);
            return redirect('list-gallery-category')->with('flash_message', 'Updated!');  
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
                    return redirect('list-gallery-category')->with(compact('msg', 'status'));
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