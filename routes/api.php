<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([
    'middleware' => 'api',
    'namespace' => 'Api',
    'prefix' => 'auth'
], function () {
    Route::post('login', 'AuthController@login');
    Route::post('forgetpassword/1', 'AuthController@forgetpassword');
    Route::post('resetpassword/2', 'AuthController@resetpassword');
    Route::post('profile', 'AuthController@me');
    Route::post('profile/update', 'AuthController@me_update');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::get('test', 'AuthController@test');
    Route::post('showCourse', 'CoursesController@showCourse');
    Route::post('add/course/favorite/{course_id}', 'CoursesController@addFavoriteCourse');
    Route::post('remove/course/favorite/{course_id}', 'CoursesController@removeFavoriteCourse');
    Route::post('course/favorite', 'CoursesController@myFavoriteCourse');


});

Route::group([
    'namespace' => 'Api',
],function(){
    Route::post('register/1', 'AuthController@register1');
    Route::post('register/2', 'AuthController@register2');
    Route::get('streams', 'LiveStreamController@getStreams');
    Route::get('streams/near', 'LiveStreamController@getNearStreams');

    Route::get('get/packages', 'AuthController@getPackages');
    Route::post('package/subscribe', 'PaymentController@charge');

    Route::resource('chiefs', 'ChiefController');
    Route::get('chief_all_courses/{chief_id}/','ChiefController@courses');
    Route::resource('courses', 'CoursesController');
    Route::resource('packages', 'PackagesController');

    Route::post('updateUserPackage', 'PackagesController@success_package');

    Route::post('courses/lessons/{course_id}', 'CoursesController@lessons');
    Route::post('courses/lesson/quiz/{lesson_id}', 'CoursesController@quiz');
    Route::post('courses/lesson/quiz/answer/solve', 'CoursesController@userQuizAnswer');

    Route::get('achievement', 'HomePageController@achievement');
    Route::get('studentsReview','HomePageController@studentsReview');
    Route::get('footer', 'HomePageController@footer');


    Route::get('get/contact/mails', 'CoursesController@getContactMaisl');
    Route::post('contact', 'CoursesController@sendMailCotactUs');
    Route::post('contactChief', 'CoursesController@sendMailChief');


});




