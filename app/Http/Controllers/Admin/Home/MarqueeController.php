<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Marquee;
use App\Http\Services\Admin\Home\MarqueeServices;
use Validator;
use Illuminate\Validation\Rule;
class MarqueeController extends Controller
{

   public function __construct()
    {
        $this->service = new MarqueeServices();
    }
    public function index()
    {
        try {
            $marquees = $this->service->getAllMarquee();
            return view('admin.pages.home.marquee.list-marquee', compact('marquees'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function add()
    {
        return view('admin.pages.home.marquee.add-marquee');
    }

    public function store(Request $request) {
        $rules = [
            'title' => 'required|max:255',
            'marquee_tab_id' => 'required|max:255',
            'url' => 'required',
            // 'url' => ['required','regex:/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i'],
            
         ];
    $messages = [   
        'title.required'=>'Please enter title.',
        'title.max'   => 'Please  enter text length upto 255 character only.',
        'url.required'=>'Please enter url.',
        // 'url.regex'=>'Please enter valid url.',
       
    ];
    // print_r($messages);
    // die();

    try {
        $validation = Validator::make($request->all(),$rules,$messages);
     
        if($validation->fails() )
        {
            return redirect('add-marquee')
                ->withInput()
                ->withErrors($validation);
        }
        else
        {
            $add_marquee = $this->service->addMarquee($request);
            if($add_marquee)
            {
                $msg = $add_marquee['msg'];
                $status = $add_marquee['status'];
                if($status=='success') {
                    return redirect('list-marquee')->with(compact('msg','status'));
                }
                else {
                    return redirect('add-marquee')->withInput()->with(compact('msg','status'));
                }
            }

        }
    } catch (Exception $e) {
        return redirect('add-marquee')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
    }
}
    public function show(Request $request)
    {
        try {
            $marquees = $this->service->getById($request->show_id);
            return view('admin.pages.home.marquee.show-marquee', compact('marquees'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function edit(Request $request) {
        $edit_data_id = base64_decode($request->edit_id);
        $marquees = $this->service->getById($edit_data_id);
        return view('admin.pages.home.marquee.edit-marquee', compact('marquees'));
    }

    public function update(Request $request) {
    $rules = [
        'title' => 'required|max:255',
        'marquee_tab_id' => 'required|max:255',
        'url' => 'required',
        // 'url' => ['required','regex:/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i'],
        
     ];

    $messages = [   
        'title.required'=>'Please enter title.',
        // 'title.regex' => 'Please  enter text only.',
        'title.max'   => 'Please  enter text length upto 255 character only.',
        'url.required'=>'Please enter url.',
        // 'url.regex'=>'Please valid url.',
       
    ];

    try {
        $validation = Validator::make($request->all(),$rules, $messages);
        if ($validation->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validation);
        } else {
            $update_marquee = $this->service->updateMarquee($request);
            if ($update_marquee) {
                $msg = $update_marquee['msg'];
                $status = $update_marquee['status'];
                if ($status == 'success') {
                    return redirect('list-marquee')->with(compact('msg', 'status'));
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
public function updateOne(Request $request)
{
    try {
        $active_id = $request->active_id;
    $result = $this->service->updateOne($active_id);
        return redirect('list-marquee')->with('flash_message', 'Updated!');  
    } catch (\Exception $e) {
        return $e;
    }
}
public function destroy(Request $request){
    try {
        $marquees = $this->service->deleteById($request->delete_id);
        if ($marquees) {
            $msg = $marquees['msg'];
            $status = $marquees['status'];
            if ($status == 'success') {
                return redirect('list-marquee')->with(compact('msg', 'status'));
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