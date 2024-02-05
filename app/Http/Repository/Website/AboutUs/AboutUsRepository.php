<?php
namespace App\Http\Repository\Website\AboutUs;

use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
use Session;
use App\Models\ {
    Gallery

};

class AboutUsRepository  {
    public function getAllGallery()
    {
        try {
            $data_output = Gallery::where('is_active','=',true);
            $data_output =  $data_output->select('image');
            $data_output =  $data_output->get()
                            ->toArray();
            return  $data_output;
        } catch (\Exception $e) {
            return $e;
        }
    }

}