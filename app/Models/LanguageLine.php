<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LanguageLine extends Model
{
    protected $table = 'language_lines';

    protected $fillable = [
        'group',
        'key',
        'text'
    ];
}
