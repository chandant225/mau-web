<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
    protected $table = 'galleries';
    protected $fillable = ['title','slug','images_name','cover_image','attached_file'];
    protected $casts = [
        'images_name' => 'array'
    ];

}
