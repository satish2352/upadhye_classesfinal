<?php

namespace App\Http\Controllers\Admin\Application;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Admin\Application\ApplicationListServices;
use Session;
use Validator;
use App\Models\ {
    ApplicationForm

};

class ApplicationListController extends Controller
{
    public function __construct(){
    $this->service = new ApplicationListServices();
    }
    public function index()
    {
        try {
            $get_application_form = $this->service->getAllApplicationForm();
            return view('admin.pages.application.list-application-form', compact('get_application_form'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function show(Request $request) {
        try {
            $applicationform = $this->service->getById($request->show_id);
            return view('admin.pages.application.show-application-form', compact('applicationform'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function destroy(Request $request){
        try {
            $delete_applicationform = $this->service->deleteById($request->delete_id);
            if ($delete_applicationform) {
                $msg = $delete_applicationform['msg'];
                $status = $delete_applicationform['status'];
                if ($status == 'success') {
                    return redirect('list-application-form')->with(compact('msg', 'status'));
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
