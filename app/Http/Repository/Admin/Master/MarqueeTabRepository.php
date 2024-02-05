<?php
namespace App\Http\Repository\Admin\Master;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	MarqueeTab
};

class MarqueeTabRepository{
    public function getAll(){
        try {
            $data_output = MarqueeTab::orderBy('updated_at', 'desc')->get();
            return $data_output;
        } catch (\Exception $e) {
            return $e;
        }
    }


	public function addAll($request){
        try {
            $incidenttype_data = new MarqueeTab();
            $incidenttype_data->title = $request['title'];
            $incidenttype_data->save();       
                
            return $incidenttype_data;

        } catch (\Exception $e) {
            return [
                'msg' => $e,
                'status' => 'error'
            ];
        }
    }
    public function getById($id){
        try {
            $incidenttype = MarqueeTab::find($id);
            if ($incidenttype) {
                return $incidenttype;
            } else {
                return null;
            }
        } catch (\Exception $e) {
            return $e;
            return [
                'msg' => 'Failed to get by Id Marquee Tab.',
                'status' => 'error'
            ];
        }
    }
    public function updateAll($request){
        try {
            $incidenttype_data = MarqueeTab::find($request->id);
            
            if (!$incidenttype_data) {
                return [
                    'msg' => 'Marquee Tab data not found.',
                    'status' => 'error'
                ];
            }
        // Store the previous image names
            $incidenttype_data->title = $request['title'];
            $incidenttype_data->save();        
        
            return [
                'msg' => 'Marquee Tab data updated successfully.',
                'status' => 'success'
            ];
        } catch (\Exception $e) {
            return $e;
            return [
                'msg' => 'Failed to update Marquee Tab data.',
                'status' => 'error'
            ];
        }
    }

    public function deleteById($id) {
        try {
            $incidenttype = MarqueeTab::find($id);
               // Delete the record from the database
                $incidenttype->delete();
                
                return $incidenttype;
            
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function updateOne($request){
        try {
            $slide = MarqueeTab::find($request); // Assuming $request directly contains the ID

            // Assuming 'is_active' is a field in the Slider model
            if ($slide) {
                $is_active = $slide->is_active === 1 ? 0 : 1;
                $slide->is_active = $is_active;
                $slide->save();

                return [
                    'msg' => 'Slide updated successfully.',
                    'status' => 'success'
                ];
            }

            return [
                'msg' => 'Slide not found.',
                'status' => 'error'
            ];
        } catch (\Exception $e) {
            return [
                'msg' => 'Failed to update slide.',
                'status' => 'error'
            ];
        }
    }
    
       
}