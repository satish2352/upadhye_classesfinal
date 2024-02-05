<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseDetailsModel extends Model
{
    use HasFactory;
    protected $table = 'course_details';
    protected $primaryKey = 'id';
    protected $fillable = ['title','description', 'image'];
}
