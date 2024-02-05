<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReasonsChooseUpadhyeClasses extends Model
{
    use HasFactory;
    protected $table = 'reasons_choose_upadhye_classes';
    protected $primaryKey = 'id';
    protected $fillable = ['title','description', 'image'];
}
