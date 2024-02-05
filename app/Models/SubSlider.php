<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubSlider extends Model
{
    use HasFactory;
    protected $table = 'sub_slider';
    protected $primaryKey = 'id';
    protected $fillable = ['image'];
}
