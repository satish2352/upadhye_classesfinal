<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marquee extends Model
{
    use HasFactory;
    protected $table = 'marquee';
    protected $primaryKey = 'id';
    protected $fillable = ['title','marquee_tab_id','url'];
}
