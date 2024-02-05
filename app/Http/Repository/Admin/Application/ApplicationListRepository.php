<?php
namespace App\Http\Repository\Admin\Application;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	ApplicationForm,
    LocationAddress
};
use Config;

class ApplicationListRepository  {

    public function getAllApplicationForm(){
        try {
            // return ApplicationForm::all();
            $modal_data = LocationAddress::join('application_form', 'application_form.edu_location_id','=', 'location_address.id')
            ->select('application_form.*', 'location_address.name')
            ->orderBy('application_form.created_at', 'desc')
            ->get();
        return $modal_data;
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function getById($id)
    {
        try {
            $applicationform = ApplicationForm::find($id);
            if ($applicationform) {
                return $applicationform;
            } else {
                return null;
            }
        } catch (\Exception $e) {
            return $e;
            return [
                'msg' => 'Failed to get by id Application Form.',
                'status' => 'error'
            ];
        }
    }
    public function deleteById($id)
{
    try {
        $applicationForm = ApplicationForm::find($id);

        if ($applicationForm) {
            $applicationForm->delete();
        }

        return $applicationForm;
    } catch (\Exception $e) {
        return $e;
    }
}


}