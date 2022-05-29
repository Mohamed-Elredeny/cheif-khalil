<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesLessonsQuizQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses_lessons_quiz_questions', function (Blueprint $table) {
            $table->id();
            $table->text('question_ar');
            $table->text('question_en');

            $table->text('correct_answer_ar');
            $table->text('correct_answer_en');

            $table->text('all_answers_ar');
            $table->text('all_answers_en');

            $table->unsignedBigInteger('courses_lessons_quiz_id');
            $table->foreign('courses_lessons_quiz_id')->references('id')->on('courses_lessons_quiz');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses_lessons_quiz_questions');
    }
}
