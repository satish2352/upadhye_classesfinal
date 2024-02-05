<?php
namespace App\Http\Services\Admin\OurResult;

use App\Http\Repository\Admin\OurResult\OurResultRepository;

use App\Models\
{ OurResult };
use Carbon\Carbon;
use Config;
use Storage;

class OurResultServices
{

	protected $repo;

    /**
     * TopicService constructor.
     */
    public function __construct()
    {
        $this->repo = new OurResultRepository();
    }
    public function getAll(){
        try {
            return $this->repo->getAll();
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function addAll($request){
        try {
           
            $last_id = $this->repo->addAll($request);
            $path = Config::get('DocumentConstant.OUR_RESULT_ADD');
            $englishImageName = $last_id['englishImageName'];
            uploadImage($request, 'image', $path, $englishImageName);

            if ($last_id) {
                return ['status' => 'success', 'msg' => 'Our Result Added Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => ' Our Result get Not Added.'];
            }  
        } catch (Exception $e) {
            return ['status' => 'error', 'msg' => $e->getMessage()];
        }      
    }
    
    public function getById($id){
        try {
            return $this->repo->getById($id);
        } catch (\Exception $e) {
            return $e;
        }
    }
   

    public function updateAll($request){
        try {
            $return_data = $this->repo->updateAll($request);

            
            $path = Config::get('DocumentConstant.OUR_RESULT_ADD');

            if ($request->hasFile('image')) {
                if ($return_data['image']) {
                    if (file_exists_view(Config::get('DocumentConstant.OUR_RESULT_DELETE') . $return_data['image'])) {
                        removeImage(Config::get('DocumentConstant.OUR_RESULT_DELETE') . $return_data['image']);
                    }    

                 }
    
                $englishImageName = $return_data['last_insert_id'] . '_' . rand(100000, 999999) . '_english.' . $request->image->extension();
                uploadImage($request, 'image', $path, $englishImageName);
                $gallery = OurResult::find($return_data['last_insert_id']);
                $gallery->image = $englishImageName;
                $gallery->save();
    
            }
            if ($return_data) {
                return ['status' => 'success', 'msg' => 'Our Result Updated Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Our Result  Not Updated.'];
            }  
        } catch (Exception $e) {
            return ['status' => 'error', 'msg' => $e->getMessage()];
        }      
    }

    public function updateOne($id){
        return $this->repo->updateOne($id);
    }

    public function deleteById($id){
        try {
            $delete = $this->repo->deleteById($id);
            if ($delete) {
                return ['status' => 'success', 'msg' => 'Deleted Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => ' Not Deleted.'];
            }  
        } catch (Exception $e) {
            return ['status' => 'error', 'msg' => $e->getMessage()];
        } 
    }
}