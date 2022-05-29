<?php

namespace App\models\Trans;

use Illuminate\Database\Eloquent\Model;

class HomeStudentReview extends Model
{
    protected $table = 'home_students_reviews';
    protected $fillable = [
        'chief_name_ar',
        'chief_role_ar',
        'chief_description_ar',
        'chief_name_en',
        'chief_role_en',
        'chief_description_en',
        'image'
    ];
}
