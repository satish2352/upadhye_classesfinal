<?php

namespace App\Http\Controllers\Admin\Application;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Admin\Application\FessPaymentListServices;
use Session;
use Validator;

class FessPaymentListController extends Controller
{
    public function __construct(){
    $this->service = new FessPaymentListServices();
    }
    public function index(){
        try {
            $get_fesspayment = $this->service->getAllFessPaymentForm();
            return view('admin.pages.application.list-fesspayment-form', compact('get_fesspayment'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function show(Request $request) {
        try {
            $fesspaymentform = $this->service->getById($request->show_id);
            return view('admin.pages.application.show-fesspayment-form', compact('fesspaymentform'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function destroy(Request $request){
        try {
            $delete_fesspayment = $this->service->deleteById($request->delete_id);
            if ($delete_fesspayment) {
                $msg = $delete_fesspayment['msg'];
                $status = $delete_fesspayment['status'];
                if ($status == 'success') {
                    return redirect('list-fesspayment-form')->with(compact('msg', 'status'));
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
