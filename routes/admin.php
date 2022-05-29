<?php

use Illuminate\Support\Facades\Route;



Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){


    //uth::routes();
    Route::get('fileupload1', 'FileUploadController@fileUpload1')->name('chief.video.page');
    Route::get('fileupload', 'FileUploadController@fileUpload')->name('admin.video.page');
    Route::post('fileupload', 'FileUploadController@fileStore');

    // Admin routes
    Route::prefix('admin')->group(function(){
        Route::get('/', 'Users\Admin\AdminController@index')->name('admin.dashboard');
        Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
        Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
        Route::get('/register', 'Auth\AdminRegisterController@showRegisterForm')->name('admin.register');
        Route::post('/register', 'Auth\AdminRegisterController@register')->name('admin.register.submit');

        Route::get('password-reset', 'Auth\AdminForgotPasswordController@showForm')->name('admin.password.forget'); //I did not create this controller. it simply displays a view with a form to take the email
        Route::post('password-reset', 'Auth\AdminForgotPasswordController@sendPasswordResetToken')->name('admin.password.email');
        Route::get('reset-password/{token}', 'Auth\AdminForgotPasswordController@showPasswordResetForm');
        Route::post('reset-password/{token}', 'Auth\AdminForgotPasswordController@resetPassword')->name('admin.password.update');

        Route::group(['namespace'=>'Users\Admin\Dashboard','middleware'=>'auth:admin'],function(){
            Route::resource('packages','PackagesController');//Done
            Route::get('/package/features/get/{package_id}','PackagesController@getFeature')->name('feature.get');
            Route::post('/package/features/add','PackagesController@addFeature')->name('feature.add');
            Route::get('/package/features/remove/{id}','PackagesController@removeFeature')->name('feature.remove');
            Route::post('/package/features/change/number','PackagesController@chnageFeature')->name('feature.change');


            Route::resource('admins','AdminsController');
            Route::resource('users','UsersController');
            Route::post('users/state','UsersController@AcceptOrRefuse')->name('users.state');
            Route::post('users/ban','UsersController@BanUser')->name('users.ban');

            Route::resource('chiefs','ChiefsController');
            Route::post('chiefs/state','ChiefsController@AcceptOrRefuse')->name('chiefs.state');
            Route::get('chiefs/edit/skill/delete/{skill_id}','ChiefsController@deleteSkill')->name('skill.delete');

            Route::resource('categories','CategoriesController');
            Route::resource('courses','CoursesController');
            Route::get('courses/lesson/add/question/{quiz_id}/{num_of_questions}','LessonsController@addQuestion')->name('admin.lesson.add.question');
            Route::get('courses/lesson/delete/question/{id}','LessonsController@deleteQuestions')->name('admin.lesson.remove.question');
            Route::post('courses/lesson/update/question/','LessonsController@updateQuestions')->name('admin.lesson.update.question');
            Route::post('courses/lesson/api/uploadVideo','LessonsController@uploadVideo')->name('admin.lesson.uploadVideo');



            Route::resource('lessons','LessonsController',['except'=>['index,create']]);
            Route::get('/course/lessons/{course_id}', 'LessonsController@index')->name('lessons.index');
            Route::get('/course/lessons/create/{course_id}', 'LessonsController@create')->name('lessons.create');
            Route::resource('users','UsersController');

            Route::resource('advs','VideosAdvertisementController');
            Route::get('admin/edit/advs/delete/{adv_id}','VideosAdvertisementController@deleteAdv')->name('adv.delete');


            Route::resource('live','LivesController');
            Route::get('live/state/{flag}','LivesController@changeFlag')->name('change.flag');

            Route::get('mails/view','MailsController@view')->name('admin.mails');
            Route::post('mails/add','MailsController@add')->name('admin.mails.add');
            Route::get('mails/remove/{id}','MailsController@remove')->name('admin.mails.remove');


            Route::get('translation/footer','TranslationController@view_footer')->name('translation.footer');
            Route::get('translation/home_achievements','TranslationController@view_home_achievements')->name('translation.home_achievements');
            Route::get('translation/home_students_reviews','TranslationController@view_home_students_reviews')->name('translation.home_students_reviews');
            Route::get('translation/home_students_reviews/view/add','TranslationController@create_review')->name('translation.reviews.view_add');
            Route::post('translation/home_students_reviews/add','TranslationController@store_review')->name('translation.reviews.add');
            Route::get('translation/home_students_reviews/delete/{category}','TranslationController@delete_review')->name('translation.reviews.delete');

            Route::get('delete/stream/{stream_id}', 'LivesController@deleteStream')->name('chief.stream.delete');


            Route::post('file-upload', 'TranslationController@fileUploadPost')->name('fileUploadPost');

            Route::put('translation/footer/update','TranslationController@update_footer')->name('translation.footer.update');
            Route::put('translation/home_achievements/update','TranslationController@uodate_home_achievements')->name('translation.home_achievements.update');

            //privacy
            Route::any('translation/privacy/index','TranslationController@index_privacy')->name('translation.privacy.index');
            Route::any('translation/privacy/create','TranslationController@create_privacy')->name('translation.privacy.create');
            Route::any('translation/privacy/store','TranslationController@store_privacy')->name('translation.store.privacy');
            Route::any('translation/privacy/edit/{id}','TranslationController@edit_privacy')->name('translation.edit.privacy');
            Route::any('translation/privacy/deleteSup/{id}/{i}','TranslationController@delete_subtitle_privacy')->name('privacy.subtitle.destroy');
            Route::any('translation/privacy/update/{id}','TranslationController@udate_privacy')->name('translation.update.privacy');


        });
    });


    Route::prefix('chief')->group(function() {
        //Chief Home Page
        Route::get('/', 'Users\Chief\ChiefController@index')->name('chief.dashboard');

        Route::group(['namespace'=>'Users\Chief\Dashboard'],function(){
            //Sections Routes.
            //Route::resource('courses','CoursesController');

        });
    });



});
Route::get('live',function(){
    return view('admin.sections.liveStream.index');
})->name('stream.create');



Route::post('/create_class', 'Stream\SessionsController@createClass')
    ->name('create_class');

// This route is used by both teachers and students to join a class

Route::get('/classroom/{id}', 'Stream\SessionsController@showClassRoom')
    ->where('id', '[0-9]+')
    ->name('classroom');
Route::get('/yamshl','Stream\SessionsController@Test');

////////////////////////////////////////// Test //////////////////////////////////////
Route::get('test_upload', function () {
    return view('upload_media_test');
});
Route::post('courses/lesson/api/real_time','LessonsController@real_time')->name('admin.lesson.real_time');



////////////////////////////////////////// End Test //////////////////////////////////////
