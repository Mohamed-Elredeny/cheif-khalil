<?php

namespace App\models\admin;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table = 'videos';
    protected $fillable = [
        'video',
        'type',
        'name'
    ];
}
