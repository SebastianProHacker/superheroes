<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Superheroe extends Model
{
    protected $fillable = [
        'real_name',
        'superhero_name',
        'photo_url',
        'additional_info',
    ];
}
