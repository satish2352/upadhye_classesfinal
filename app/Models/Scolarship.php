<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scolarship extends Model
{
    use HasFactory;
    protected $table = 'scolarship_form';
    protected $primaryKey = 'id';
    protected $fillable = ['edu_location_id','edu_course','edu_mode', 'full_name', 'email','mobile_number','roll_number','address'];
}
