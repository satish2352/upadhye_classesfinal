<?php

namespace App\Http\Controllers\Admin\Application;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Admin\Application\ScolarshipListServices;
use Session;
use Validator;

class ScolarshipListController extends Controller
{
    public function __construct(){
    $this->service = new ScolarshipListServices();
    }
    public function index(){
        try {
            $get_scolarship_form = $this->service->getAllScolarshipForm();
            return view('admin.pages.application.list-scolarship-form', compact('get_scolarship_form'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function show(Request $request) {
        try {
            $scolarshipform = $this->service->getById($request->show_id);
            return view('admin.pages.application.show-scolarship-form', compact('scolarshipform'));
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
                    return redirect('list-scolarship-form')->with(compact('msg', 'status'));
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
