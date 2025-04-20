<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryItem extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "serie_name",
        "year",
        "inventory_id",
        "img_url",
        "artist_id",
        "status_id",
        "language_id",
        "img_url",
    ];

    public function language()
    {
        return $this->belongsTo(Language::class, 'language_id');
    }

    public function artist()
    {
        return $this->belongsTo(Artist::class, 'artist_id');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }
}
