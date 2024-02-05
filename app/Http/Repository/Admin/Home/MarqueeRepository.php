<?php
namespace App\Http\Repository\Admin\Home;

use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	Marquee
};

class MarqueeRepository  {
    public function getAllMarquee() {
        $data_users = Marquee::join('marquee_tab', function($join) {
							$join->on('marquee.marquee_tab_id', '=', 'marquee_tab.id');
						})
						->select('marquee_tab.title as marquee_title',
								'marquee.title',
								'marquee.url',
								'marquee.id',
								'marquee.is_active'
							)->orderBy('marquee.id', 'desc')->get();
		return $data_users;
	}


	public function addMarquee($request)
{
    try {
        $marquee_data = new Marquee();
        $marquee_data->title = $request['title'];
        $marquee_data->marquee_tab_id = $request['marquee_tab_id'];
        $url = $request['url'];
        // Check if "http://" or "https://" is already present in the URL
        if (!str_starts_with($url, 'http://') && !str_starts_with($url, 'https://')) {
            $url = 'http://' . $url; // Add "http://" to the beginning of the URL
        }
        $marquee_data->url = $url;

        $marquee_data->save();       
     
		return $marquee_data;
    } catch (\Exception $e) {
        return [
            'msg' => $e,
            'status' => 'error'
        ];
    }
}
public function getById($id)
{
    try {
        $marquee = Marquee::join('marquee_tab', function($join) {
            $join->on('marquee.marquee_tab_id', '=', 'marquee_tab.id');
        })
        ->select('marquee_tab.title as marquee_title',
                'marquee.title',
                'marquee.url',
                'marquee.id',
                'marquee.is_active'
            )
        ->where('marquee.id', $id) // Add a condition to filter by ID
        ->first(); // Use first() instead of get()

        if ($marquee) {
            return $marquee;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        // Log the exception or handle it accordingly
        return [
            'msg' => 'Failed to get by id budget.',
            'status' => 'error'
        ];
    }
}

public function updateMarquee($request)
{
    try {
        $marquee_data = Marquee::find($request->id);
        $marquee_data->title = $request['title'];
        $marquee_data->marquee_tab_id = $request['marquee_tab_id'];
        $url = $request['url'];
        // Check if "http://" or "https://" is already present in the URL
        if (!str_starts_with($url, 'http://') && !str_starts_with($url, 'https://')) {
            $url = 'http://' . $url; // Add "http://" to the beginning of the URL
        }
        $marquee_data->url = $url;
       
        $marquee_data->update();  
             
        return [
            'msg' => 'Marquee updated successfully.',
            'status' => 'success'
        ];
    } catch (\Exception $e) {
        return $e;
        return [
            'msg' => 'Failed to update marquee.',
            'status' => 'error'
        ];
    }
}
public function updateOne($request)
{
    try {
        $marquee = Marquee::find($request); // Assuming $request directly contains the ID        
        if ($marquee) {
            $is_active = $marquee->is_active === 1 ? 0 : 1;
            $marquee->is_active = $is_active;
            $marquee->save();

            return [
                'msg' => 'Marquee updated successfully.',
                'status' => 'success'
            ];
        }

        return [
            'msg' => 'Marquee not found.',
            'status' => 'error'
        ];
    } catch (\Exception $e) {
        return [
            'msg' => 'Failed to update slide.',
            'status' => 'error'
        ];
    }
}


public function deleteById($id)
{
    try {
        $marquee = Marquee::destroy($id);
        if ($marquee) {
            return $marquee;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
		return [
            'msg' => 'Failed to delete marquee.',
            'status' => 'error'
        ];
    }
}

}