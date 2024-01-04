<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryImage extends Model
{
    use HasFactory;

    protected $fillable = ['filename','album_slug'];

    protected $table = 'gallery_images';

    public function galleryAlbum () {
        return $this->belongsTo(galleryAlbum::class);
    }
}
