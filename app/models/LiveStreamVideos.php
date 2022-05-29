<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class LiveStreamVideos extends Model
{
    protected $table = 'live_stream_videos';

    protected $fillable = [
        'title_ar',
        'title_en',
        'description_ar',
        'description_en',
        'start_date',
        'url',
        'category_id',
    ];
    public function category()
    {
        return $this->belongsTo('App\models\Categories','category_id');
    }
}
