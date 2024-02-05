<?php

namespace App\Http\Controllers\Website\Application;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Website\Application\ApplicationFormServices;
use Session;
use Validator;
use App\Models\ {
    LocationAddress,
    EducationBoard,
    ApplicationForm,
    EducationClass

};
class ApplicationFormController extends Controller
{
    public function __construct()
    {
        $this->service = new ApplicationFormServices();
    }
    public function getApplicationform(){
        try {
            return view('website.pages.application.applicatioform');
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function getLocation(Request $request)
    {
        $classId = $request->input('classId');
    
        $locations = LocationAddress::where('location_id', $classId)
                        ->get(['location_id', 'name']);
    
        return response()->json(['location_id' => $locations]);
    }
    
    public function addApplicationForm(Request $request) {
       $rules = [
            'edu_location_id' => 'required',
            'edu_board_id' => 'required',
            'edu_class_id' => 'required',
            'edu_course_id' => 'required',
            'full_name' => 'required',
            'email' => 'required|email',
            'mobile_number' => 'required|regex:/^(\+\d{1,3}[- ]?)?\d{10}$/',
            'alternative_mobile_number' => 'required|regex:/^(\+\d{1,3}[- ]?)?\d{10}$/',
            'g-recaptcha-response' => 'required|captcha',
            'address' => 'required',
            ];
        $messages = [
            'edu_location_id.required' => 'Please Selecte Location.',
            'edu_board_id.required' => 'Please Selecte Board.',
            'edu_class_id.required' => 'Please Selecte Class.',
            'edu_course_id.required' => 'Please Selecte Course.',
            'full_name.required' => 'Please Enter Full Name.',
            'email.required' => 'Please Enter Email.',
            'email.email' => 'Please Enter a Valid Email Address.',
            'mobile_number.required' => 'Please Enter Mobile Number.',
            'mobile_number.regex' => 'Please Enter a Valid Mobile Number.',
            'address.required' => 'Please Enter Address.',
            'alternative_mobile_number.required' => 'Please Enter Mobile Number.',
            'alternative_mobile_number.regex' => 'Please Enter a Valid Mobile Number.',
            'g-recaptcha-response.captcha' => 'Captcha error! try again later or contact site admin.',
            'g-recaptcha-response.required' =>'Please verify that you are not a robot.',
        ];
    
        try {
            $validation = Validator::make($request->all(),$rules,$messages);
            if($validation->fails() )
            {
                return redirect('applicatioform')
                    ->withInput()
                    ->withErrors($validation);
            }
            else
            {
                $add_contact = $this->service->addApplicationform($request);
    
                if($add_contact)
                {
    
                    $msg = $add_contact['msg'];
                    $status = $add_contact['status'];
                    if($status=='success') {
                        Session::flash('success_message', 'Application Form submitted successfully!');
                        return redirect('applicatioform')->with(compact('msg','status'));
                    }
                    else {
                        return redirect('applicatioform')->withInput()->with(compact('language','menu','msg','status'));
    
                    }
                }
    
            }
        } catch (Exception $e) {
            return redirect('applicatioform')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
        }
    }
}
