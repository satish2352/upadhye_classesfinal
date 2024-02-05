<?php

namespace App\Http\Controllers\Website\Application;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Website\Application\FessPaymentFormServices;
use Session;
use Validator;
use App\Models\ {
    LocationAddress,
    EducationBoard,
    ApplicationForm,
    EducationClass

};

class FessPaymentFormController extends Controller
{
    public function __construct()
    {
        $this->service = new FessPaymentFormServices();
    }
    public function getAllFessPaymentForm(){
        try {
            return view('website.pages.application.feespayment');
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function addFessPaymentForm(Request $request) {
        $rules = [
             'edu_location_id' => 'required',
             'edu_course' => 'required',
             'edu_mode' => 'required',
             'full_name' => 'required',
             'email' => 'required|email',
             'mobile_number' => 'required|regex:/^(\+\d{1,3}[- ]?)?\d{10}$/',
             'amount' => 'required',
             'g-recaptcha-response' => 'required|captcha',
             'address' => 'required',
             'remark' => 'required',
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
             'remark.required' => 'Please Enter Remark.',
             'amount.required' => 'Please Enter Amount.',
             'g-recaptcha-response.captcha' => 'Captcha error! try again later or contact site admin.',
             'g-recaptcha-response.required' =>'Please verify that you are not a robot.',
         ];
     
         try {
             $validation = Validator::make($request->all(),$rules,$messages);
             if($validation->fails() )
             {
                 return redirect('feespayment')
                     ->withInput()
                     ->withErrors($validation);
             }
             else
             {
                 $add_contact = $this->service->addFessPaymentForm($request);
     
                 if($add_contact)
                 {
     
                     $msg = $add_contact['msg'];
                     $status = $add_contact['status'];
                     if($status=='success') {
                         Session::flash('success_message', 'Fess Payment Form submitted successfully!');
                         return redirect('feespayment')->with(compact('msg','status'));
                     }
                     else {
                         return redirect('feespayment')->withInput()->with(compact('language','menu','msg','status'));
     
                     }
                 }
     
             }
         } catch (Exception $e) {
             return redirect('feespayment')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
         }
     }
}
