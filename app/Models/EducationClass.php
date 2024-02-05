<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationClass extends Model
{
    use HasFactory;
    protected $table = 'education_class';
    protected $primaryKey = 'id';
    protected $fillable = ['name'];
}
