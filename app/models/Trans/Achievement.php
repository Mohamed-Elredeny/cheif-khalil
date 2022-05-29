<?php

namespace App\models\Trans;

use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    protected $table = 'home_achievements';
    protected $fillable = [
        'title_en',
        'achievement_1_en',
        'achievement_2_en',
        'achievement_3_en',
        'achievement_details_1_en',
        'achievement_details_2_en',
        'achievement_details_3_en',
        'title_ar',
        'achievement_1_ar',
        'achievement_2_ar',
        'achievement_3_ar',
        'achievement_details_1_ar',
        'achievement_details_2_ar',
        'achievement_details_3_ar',
        'video',
    ];
}
