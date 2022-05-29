<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class CoursesLessonsQuizQuestions extends Model
{
    protected $table = 'courses_lessons_quiz_questions';

    protected $fillable = [
        'question_ar',
        'question_en',
        'correct_answer_en',
        'correct_answer_ar',
        'all_answers_en',
        'all_answers_ar',
        'courses_lessons_quiz_id',
    ];
    public function lesson()
    {
        return $this->belongsTo('App\models\CoursesLessons','courses_lessons_quiz_id');
    }
}
