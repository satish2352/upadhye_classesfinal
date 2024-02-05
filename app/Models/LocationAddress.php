<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocationAddress extends Model
{
    use HasFactory;
    protected $table = 'location_address';
    protected $primaryKey = 'id';
    protected $fillable = ['name'];
}
