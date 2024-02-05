<?php

namespace App\Http\Controllers\Website\ContactUs;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Website\ContactUs\ContactUsServices;
use Session;
use Validator;

class ContactUsController extends Controller
{
    public function __construct()
    {
        $this->service = new ContactUsServices();
    }
    public function getContactUs()
    {

        try {
            return view('website.pages.contactus.contactus');
        } catch (\Exception $e) {
            return $e;
        }
    }

    
    public function addContactUs(Request $request) {
        $rules = [
            'full_name' => 'required',
            'email' => 'required|email',
            'mobile_number' => 'required|regex:/^(\+\d{1,3}[- ]?)?\d{10}$/',
            'subject' => 'required',
            'message' => 'required',
            'g-recaptcha-response' => 'required|captcha',
            ];
        $messages = [   
            'full_name.required' => 'Please Enter Full Name.',
            'email.required' => 'Please Enter Email.',
            'email.email' => 'Please Enter a Valid Email Address.',
            'mobile_number.required' => 'Please Enter Mobile Number.',
            'mobile_number.regex' => 'Please Enter a Valid Mobile Number.',
            'subject.required' => 'Please Enter Subject.',
            'message.required' => 'Please Enter Message.',
            'g-recaptcha-response.captcha' => 'Captcha error! try again later or contact site admin.',
            'g-recaptcha-response.required' =>'Please verify that you are not a robot.',
        ];
    
        try {
            $validation = Validator::make($request->all(),$rules,$messages);
            if($validation->fails() )
            {
                return redirect('contactus')
                    ->withInput()
                    ->withErrors($validation);
            }
            else
            {
                $add_contact = $this->service->addAll($request);
    
                if($add_contact)
                {
    
                    $msg = $add_contact['msg'];
                    $status = $add_contact['status'];
                    if($status=='success') {
                        Session::flash('success_message', 'Contact Us submitted successfully!');
                        return redirect('contactus')->with(compact('msg','status'));
                    }
                    else {
                        return redirect('contactus')->withInput()->with(compact('language','menu','msg','status'));
    
                    }
                }
    
            }
        } catch (Exception $e) {
            return redirect('contactus')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
        }
    }
    
}
