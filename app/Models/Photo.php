<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $table = 'photo';
    protected $fillable = ['photoarticle_id', 'image', 'description'];

    public function photoArticle()
    {
        return $this->belongsTo(PhotoArticle::class, 'photoarticle_id');
    }
}
