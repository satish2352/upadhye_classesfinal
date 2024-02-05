<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurResultCategory extends Model
{
    use HasFactory;
    protected $table = 'ourresult_category';
    protected $primaryKey = 'id';
    protected $fillable = ['title'];
}
