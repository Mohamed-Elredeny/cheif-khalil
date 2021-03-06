<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class CoursesLessons extends Model
{
    protected $table = 'courses_lessons';

    protected $fillable = [
        'name_ar',
        'name_en',
        'details_ar',
        'details_en',
        'url',
        'image',
        'lesson_number',
        'course_id',
    ];
    public function course()
    {
        return $this->belongsTo('App\models\Courses','course_id');
    }

    public function quiz() {
        return $this->hasOne('App\models\CoursesLessonsQuiz','courses_lessons_id');
    }

    public function comments() {
        return $this->hasMany('App\models\LessonsCommunity','courses_lessons_id');
    }
}
