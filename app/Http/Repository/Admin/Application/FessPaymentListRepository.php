<?php
namespace App\Http\Repository\Admin\Application;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	FessPaymentForm,
    LocationAddress
};
use Config;

class FessPaymentListRepository  {

    public function getAllFessPaymentForm(){
        try {
            // return ApplicationForm::all();
            $modal_data = LocationAddress::join('fess_payment_form', 'fess_payment_form.edu_location_id','=', 'location_address.id')
            ->select('fess_payment_form.*', 'location_address.name')
            ->orderBy('fess_payment_form.created_at', 'desc')
            ->get();
        return $modal_data;
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function getById($id)
    {
        try {
            $fesspaymentform = FessPaymentForm::find($id);
            if ($fesspaymentform) {
                return $fesspaymentform;
            } else {
                return null;
            }
        } catch (\Exception $e) {
            return $e;
            return [
                'msg' => 'Failed to get by id fesspayment List.',
                'status' => 'error'
            ];
        }
    }
    public function deleteById($id)
    {
        try {
            $fesspaymentform = FessPaymentForm::find($id);

            if ($fesspaymentform) {
                $fesspaymentform->delete();
            }

            return $fesspaymentform;
        } catch (\Exception $e) {
            return $e;
        }
    }
}