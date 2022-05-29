<?php

use Illuminate\Support\Facades\Route;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){
    Route::prefix('chief')->group(function(){
        Route::group(['namespace'=>'Users\Chief\Dashboard','middleware'=>'auth:chief'],function(){
            Route::resource('chief_courses','CoursesController');
            Route::resource('chief_lessons','LessonsController',['except'=>['index,create']]);

            Route::get('/course/lessons/create/{course_id}', 'LessonsController@create')->name('chief.lessons.create');
            Route::get('courses/lesson/add/question/{quiz_id}/{num_of_questions}','LessonsController@addQuestion')->name('chief.lesson.add.question');
            Route::get('courses/lesson/delete/question/{id}','LessonsController@deleteQuestions')->name('chief.lesson.remove.question');
            Route::post('courses/lesson/update/question/','LessonsController@updateQuestions')->name('chief.lesson.update.question');
            Route::post('courses/lesson/api/uploadVideo','LessonsController@uploadVideo')->name('chief.lesson.uploadVideo');

        });
    });

});
