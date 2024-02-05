<?php
namespace App\Http\Repository\Website\Application;

use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
use Session;
use App\Models\ {
    LocationAddress,
    Scolarship,
    ApplicationForm

};

class ScolarshipFormRepository  {
  public function addScolarshipForm($request)
  {
   
      try {
          $modal_data = new Scolarship();
          $modal_data->full_name = $request['full_name'];
          $modal_data->email = $request['email'];
          $modal_data->mobile_number = $request['mobile_number'];
          $modal_data->roll_number = $request['roll_number'];
          $modal_data->edu_location_id = $request['edu_location_id'];
          $modal_data->edu_course = $request['edu_course'];
          $modal_data->edu_mode = $request['edu_mode'];
          $modal_data->address = $request['address'];  
          $modal_data->save();
          // dd($modal_data);
          $last_insert_id = $modal_data->id;
          $modal_data = Scolarship::find($last_insert_id); // Assuming $request directly contains the ID
          $modal_data->save();
        
          return $last_insert_id;
      } catch (\Exception $e) {
          return [
              'msg' => $e->getMessage(),
              'status' => 'error'
          ];
      }
  }
  
}