<?php
namespace App\Http\Repository\Admin\Application;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	Scolarship,
    LocationAddress
};
use Config;

class ScolarshipListRepository  {

    public function getAllScolarshipForm(){
        try {
            // return ApplicationForm::all();
            $modal_data = LocationAddress::join('scolarship_form', 'scolarship_form.edu_location_id','=', 'location_address.id')
            ->select('scolarship_form.*', 'location_address.name')
             ->orderBy('scolarship_form.created_at', 'desc')
            ->get();
        return $modal_data;
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function getById($id)
    {
        try {
            $scolarshipform = Scolarship::find($id);
            if ($scolarshipform) {
                return $scolarshipform;
            } else {
                return null;
            }
        } catch (\Exception $e) {
            return $e;
            return [
                'msg' => 'Failed to get by id Scolarship List.',
                'status' => 'error'
            ];
        }
    }
    public function deleteById($id)
    {
        try {
            $scolarshipform = Scolarship::find($id);

            if ($scolarshipform) {
                $scolarshipform->delete();
            }

            return $scolarshipform;
        } catch (\Exception $e) {
            return $e;
        }
    }
}