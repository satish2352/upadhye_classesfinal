<?php
namespace App\Http\Repository\Admin\Home;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
CourseDetailsModel
};
use Config;

class CourseDetailsRepository  {

    public function getAll(){
        try {
            $data_output = CourseDetailsModel::orderBy('id', 'desc')->get();
           
            return $data_output;
        } catch (\Exception $e) {
            return $e;
        }
    }
    //  public function addAll($request){
    //     try {
    //         $data =array();
    //         $dataOutput = new CourseDetailsModel();
    //         $dataOutput->course_id = $request['course_id'];
    //         $dataOutput->courses_type = $request['courses_type'];
    //         $dataOutput->admission_procedure = $request['admission_procedure'];
    //         $dataOutput->eligibility = $request['eligibility'];
    //         $dataOutput->save(); 
    //         $last_insert_id = $dataOutput->id;
            
    //         $finalOutput = CourseDetailsModel::find($last_insert_id); // Assuming $request directly contains the ID
    //         $finalOutput->save();
            
    //         return $data;

    //     } catch (\Exception $e) {
    //         return [
    //             'msg' => $e,
    //             'status' => 'error'
    //         ];
    //     }
    // }

    public function addAll($request){
        try {
            // Create a new instance of CourseDetailsModel
            $dataOutput = new CourseDetailsModel();
    
            // Assign values from the request to the model
            $dataOutput->course_id = $request['course_id'];
            $dataOutput->courses_type = $request['courses_type'];
            $dataOutput->admission_procedure = $request['admission_procedure'];
           $dataOutput->eligibility = $request['eligibility'] ?? ''; // Use empty string if not present
            $dataOutput->courses_duration = $request['courses_duration'];
            
    
            // Save the model
            $dataOutput->save(); 
   

            // Retrieve the last inserted ID
            $last_insert_id = $dataOutput->id;
            
            // Retrieve the model by ID (this step is unnecessary, but I'm keeping it for reference)
            $finalOutput = CourseDetailsModel::find($last_insert_id);
    
            // Instead of finding the model again, you can directly use $dataOutput
            return [
                'data' => $dataOutput,
                'status' => 'success'
            ];
    
        } catch (\Exception $e) {
            return [
                'msg' => $e->getMessage(), // Use getMessage() to get the exception message
                'status' => 'error'
            ];
        }
    }
    
    public function getById($id){
        try {
            $dataOutputByid = CourseDetailsModel::find($id);
            if ($dataOutputByid) {
                return $dataOutputByid;
            } else {
                return null;
            }
        } catch (\Exception $e) {
            return [
                'msg' => $e,
                'status' => 'error'
            ];
        }
    }
    public function updateAll($request){
        try {
            $return_data = array();
            $dataOutput = CourseDetailsModel::find($request->id);

            if (!$dataOutput) {
                return [
                    'msg' => 'Update Data not found.',
                    'status' => 'error'
                ];
            }
        

            
            
            
            // $dataOutput->course_id = $request['course_id'];
            $dataOutput->courses_type = $request['courses_type'];
            $dataOutput->admission_procedure = $request['admission_procedure'];
            $dataOutput->eligibility = $request['eligibility'];
            $dataOutput->courses_duration = $request['courses_duration'];

            $dataOutput->save();
            $last_insert_id = $dataOutput->id;

            $return_data['last_insert_id'] = $last_insert_id;
         
            return  $return_data;
        
        } catch (\Exception $e) {
            return [
                'msg' => 'Failed to Update Data.',
                'status' => 'error',
                'error' => $e->getMessage() // Return the error message for debugging purposes
            ];
        }
    }
    public function updateOne($request){
        try {
            $updateOutput = CourseDetailsModel::find($request); // Assuming $request directly contains the ID

            // Assuming 'is_active' is a field in the model
            if ($updateOutput) {
                $is_active = $updateOutput->is_active === 1 ? 0 : 1;
                $updateOutput->is_active = $is_active;
                $updateOutput->save();


                return [
                    'msg' => 'Data Updated Successfully.',
                    'status' => 'success'
                ];
            }
            return [
                'msg' => 'Data not Found.',
                'status' => 'error'
            ];
        } catch (\Exception $e) {
            return [
                'msg' => 'Failed to Update Data.',
                'status' => 'error'
            ];
        }
    }
    public function deleteById($id){
            try {
                $deleteDataById = CourseDetailsModel::find($id);
                if ($deleteDataById) {
                
                    $deleteDataById->delete();
                    
                    return $deleteDataById;
                } else {
                    return null;
                }
            } catch (\Exception $e) {
                return $e;
            }
    }

}