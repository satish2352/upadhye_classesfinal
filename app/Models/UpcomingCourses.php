<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UpcomingCourses extends Model
{
    use HasFactory;
    protected $table = 'upcoming_courses';
    protected $primaryKey = 'id';
    protected $fillable = ['title','description', 'start_date', 'duration', 'test_mode', 'test_medium','course_fess'];
}
