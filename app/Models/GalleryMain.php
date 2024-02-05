<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryMain extends Model
{
    use HasFactory;
    protected $table = 'gallery_main';
    protected $primaryKey = 'id';
    protected $fillable = ['category_id','english_image', 'marathi_image'];
}
