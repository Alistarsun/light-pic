<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['album_id', 'name', 'path'];
    protected $touches = ['album'];

    public function album()
    {
        return $this->belongsTo(Album::class, 'album_id', 'id');
    }
}
