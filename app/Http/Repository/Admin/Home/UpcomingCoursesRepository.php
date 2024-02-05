<?php
namespace App\Http\Repository\Admin\Home;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
UpcomingCourses
};
use Config;

class UpcomingCoursesRepository  {

    public function getAll(){
        try {
            $data_output = UpcomingCourses::orderBy('updated_at', 'desc')->get();
            return $data_output;
        } catch (\Exception $e) {
            return $e;
        }
    }
     public function addAll($request){
        try {
            $data =array();
            $dataOutput = new UpcomingCourses();
            $dataOutput->title = $request['title'];
            $dataOutput->description = $request['description'];
            $dataOutput->start_date = $request['start_date'];
            $dataOutput->duration = $request['duration'];
            $dataOutput->test_mode = $request['test_mode'];
            $dataOutput->test_medium = $request['test_medium'];
            $dataOutput->course_fess = $request['course_fess'];
                  
            $dataOutput->save(); 
            $last_insert_id = $dataOutput->id;
            $finalOutput = UpcomingCourses::find($last_insert_id); // Assuming $request directly contains the ID
            $finalOutput->save();
            // $data['last_insert_id'] =$ImageName;
            return $finalOutput;

        } catch (\Exception $e) {
            return [
                'msg' => $e,
                'status' => 'error'
            ];
        }
    }
    public function getById($id){
        try {
            $dataOutputByid = UpcomingCourses::find($id);
            if ($dataOutputByid) {
                return $dataOutputByid;
            } else {
                return null;
            }
        } catch (\Exception $e) {
            return $e;
            return [
                'msg' => 'Failed to get by id Data.',
                'status' => 'error'
            ];
        }
    }
    public function updateAll($request){
        try {
            $return_data = array();
            $dataOutput = UpcomingCourses::find($request->id);

            if (!$dataOutput) {
                return [
                    'msg' => 'Update Data not found.',
                    'status' => 'error'
                ];
            }
            // Store the previous image names
            $previousEnglishImage = $dataOutput->image;

            // Update the fields from the request
            $dataOutput->title = $request['title'];
            $dataOutput->description = $request['description'];
            $dataOutput->start_date = $request['start_date'];
            $dataOutput->duration = $request['duration'];
            $dataOutput->test_mode = $request['test_mode'];
            $dataOutput->test_medium = $request['test_medium'];
            $dataOutput->course_fess = $request['course_fess'];
            
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
            $updateOutput = UpcomingCourses::find($request); // Assuming $request directly contains the ID

            // Assuming 'is_active' is a field in the UpcomingCourses model
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
                $deleteDataById = UpcomingCourses::find($id);
                $deleteDataById->delete();
                return $deleteDataById;
            } catch (\Exception $e) {
                return $e;
            }
    }

}