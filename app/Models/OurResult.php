<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurResult extends Model
{
    use HasFactory;
    protected $table = 'ourresult';
    protected $primaryKey = 'id';
    protected $fillable = ['category_id','image'];
}
