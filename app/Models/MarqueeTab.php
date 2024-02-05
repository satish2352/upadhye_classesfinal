<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarqueeTab extends Model
{
    use HasFactory;
    protected $table = 'marquee_tab';
    protected $primaryKey = 'id';
    protected $fillable = ['title'];
}
