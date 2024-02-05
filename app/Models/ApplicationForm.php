<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationForm extends Model
{
    use HasFactory;
    protected $table = 'application_form';
    protected $primaryKey = 'id';
    protected $fillable = ['full_name', 'email','mobile_number','alternative_mobile_number','edu_location_id','edu_board_id', 'edu_class_id', 'edu_course_id', 'address'];
}
