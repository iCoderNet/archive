<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhotoArticle extends Model
{
    protected $table = 'photoarticle';

    public function photos()
    {
        return $this->hasMany(Photo::class, 'photoarticle_id');
    }
}
