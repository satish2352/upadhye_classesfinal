<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MarqueeTab;
use App\Http\Services\Admin\Master\MarqueeTabServices;
use Validator;
use Illuminate\Validation\Rule;
class MarqueeTabController extends Controller
{

   public function __construct()
    {
        $this->service = new MarqueeTabServices();
    }
    public function index()
    {
        try {
            $incidenttype_data = $this->service->getAll();
            return view('admin.pages.master.marquee-tab.list-marquee-tab', compact('incidenttype_data'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function add()
    {
        return view('admin.pages.master.marquee-tab.add-marquee-tab');
    }

    public function store(Request $request) {
        $rules = [
            'title' => 'required|unique:marquee_tab|regex:/^[a-zA-Z\s]+$/u|max:255',
         ];
        $messages = [   
            'title'       =>  'Please enter title.',
            'title.regex' => 'Please  enter text only.',
            'title.unique' => 'Title already exist.',
            'title.max'   => 'Please  enter text length upto 255 character only.',
                       
        ];

        try {
            $validation = Validator::make($request->all(),$rules,$messages);
            if($validation->fails() )
            {
                return redirect('add-marquee-tab')
                    ->withInput()
                    ->withErrors($validation);
            }
            else
            {
                $add_incidenttype_data = $this->service->addAll($request);
                if($add_incidenttype_data)
                {

                    $msg = $add_incidenttype_data['msg'];
                    $status = $add_incidenttype_data['status'];
                    if($status=='success') {
                        return redirect('list-marquee-tab')->with(compact('msg','status'));
                    }
                    else {
                        return redirect('add-marquee-tab')->withInput()->with(compact('msg','status'));
                    }
                }

            }
        } catch (Exception $e) {
            return redirect('add-marquee-tab')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
        }
    }
    
    public function edit(Request $request)
    {
        $edit_data_id = base64_decode($request->edit_id);
        $incidenttype_data = $this->service->getById($edit_data_id);
        return view('admin.pages.master.marquee-tab.edit-marquee-tab', compact('incidenttype_data'));
   
    }
    public function update(Request $request)
{
    $id = $request->input('id'); // Assuming the 'id' value is present in the request
    $rules = [
        'title' => ['required', 'max:255','regex:/^[a-zA-Z\s]+$/u', Rule::unique('marquee_tab', 'title')->ignore($id, 'id')],
    ];

    $messages = [
        'title.required' => 'Please enter an title.',
        'title.regex' => 'Please  enter text only.',
        'title.max' => 'Please enter an  title with a maximum of 255 characters.',
        'title.unique' => 'The title already exists.',
       
    ];

    try {
        $validation = Validator::make($request->all(), $rules, $messages);

        if ($validation->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validation);
        } else {
            $update_incidenttype_data = $this->service->updateAll($request);

            if ($update_incidenttype_data) {
                $msg = $update_incidenttype_data['msg'];
                $status = $update_incidenttype_data['status'];

                if ($status == 'success') {
                    return redirect('list-marquee-tab')->with(compact('msg', 'status'));
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
            $incidenttype_data = $this->service->getById($request->show_id);
            return view('admin.pages.master.marquee-tab.show-marquee-tab', compact('incidenttype_data'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function updateOne(Request $request){
        try {
            $active_id = $request->active_id;
        $result = $this->service->updateOne($active_id);
            return redirect('list-marquee-tab')->with('flash_message', 'Updated!');  
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function destroy(Request $request){
        try {
            $incidenttype_data = $this->service->deleteById($request->delete_id);
            if ($incidenttype_data) {
                $msg = $incidenttype_data['msg'];
                $status = $incidenttype_data['status'];
                if ($status == 'success') {
                    return redirect('list-marquee-tab')->with(compact('msg', 'status'));
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