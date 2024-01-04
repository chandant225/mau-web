<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryAlbum extends Model
{
    use HasFactory;

    protected $table = 'gallery_albums';

    protected $fillable = ['title','slug','position','cover_image'];

    public function galleryImage () {
        return $this->hasMany(galleryImage::class);
    }
}
