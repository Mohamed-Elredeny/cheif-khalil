<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table='videos';
    protected $fillable = [
        'video',
        'type',
        'name'
    ];
}
