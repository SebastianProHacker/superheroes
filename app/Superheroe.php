<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Superheroe extends Model
{
    protected $fillable = [
        'real_name',
        'superhero_name',
        'photo_url',
        'additional_info',
    ];

    use SoftDeletes;

    protected $dates = ['deleted_at'];
}
