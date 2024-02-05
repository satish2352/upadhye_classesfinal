<?php

namespace App\Http\Controllers\Website\Application;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Website\Application\ScolarshipFormServices;
use Session;
use Validator;
use App\Models\ {
    LocationAddress


};
class ScolarshipController extends Controller
{
    public function __construct()
    {
        $this->service = new ScolarshipFormServices();
    }
    public function getAllScolarshipForm(){
        try {
            return view('website.pages.application.scolarship');
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function addScolarshipForm(Request $request) {
        $rules = [
             'edu_location_id' => 'required',
             'edu_course' => 'required',
             'edu_mode' => 'required',
             'full_name' => 'required',
             'email' => 'required|email',
             'mobile_number' => 'required|regex:/^(\+\d{1,3}[- ]?)?\d{10}$/',
             'roll_number' => 'required',
             'g-recaptcha-response' => 'required|captcha',
             'address' => 'required',
             'agree_checkbox' => 'accepted', 
             ];
         $messages = [
             'edu_location_id.required' => 'Please Selecte Location.',
             'edu_course.required' => 'Please Selecte Class.',
             'edu_mode.required' => 'Please Selecte Course.',
             'full_name.required' => 'Please Enter Full Name.',
             'email.required' => 'Please Enter Email.',
             'email.email' => 'Please Enter a Valid Email Address.',
             'mobile_number.required' => 'Please Enter Mobile Number.',
             'mobile_number.regex' => 'Please Enter a Valid Mobile Number.',
             'address.required' => 'Please Enter Address.',
             'roll_number.required' => 'Please Enter Roll Number.',
             'g-recaptcha-response.captcha' => 'Captcha error! try again later or contact site admin.',
             'g-recaptcha-response.required' =>'Please verify that you are not a robot.',
             'agree_checkbox.accepted' => 'You must agree to the terms to submit the form.',
         ];
     
         try {
             $validation = Validator::make($request->all(),$rules,$messages);
             if($validation->fails() )
             {
                 return redirect('scolarship')
                     ->withInput()
                     ->withErrors($validation);
             }
             else
             {
                 $add_contact = $this->service->addScolarshipForm($request);
     
                 if($add_contact)
                 {
     
                     $msg = $add_contact['msg'];
                     $status = $add_contact['status'];
                     if($status=='success') {
                         Session::flash('success_message', 'Scolarship Form submitted successfully!');
                         return redirect('scolarship')->with(compact('msg','status'));
                     }
                     else {
                         return redirect('scolarship')->withInput()->with(compact('language','menu','msg','status'));
     
                     }
                 }
     
             }
         } catch (Exception $e) {
             return redirect('applicatioform')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
         }
     }
 
}
