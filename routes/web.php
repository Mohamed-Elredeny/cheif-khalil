<?php

use App\models\Trans\Achievement;
use App\models\Trans\StudentReview;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Martina;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::any('getResult', 'Martina\IndexController@getResult')->name('getResult');
Route::post('setComment', 'Martina\IndexController@setComment')->name('setComment');

Route::any('testsad', function () {
    return view('site.layouts.mmm');
});
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function () {

    Route::get('/', 'Martina\IndexController@index')->name('index');

    Route::get('/test', function () {
        return view('site.layouts.mmm');
    });

    Route::get('/about', function () {
        $Achievement = Achievement::first();
        $Reviews = StudentReview::get();
        return view('site.about',compact('Achievement','Reviews'));
    })->name('about');

    Route::get('/showContact', function () {
        return view('site.contact');
    })->name('show_contact');

    Auth::routes();

    Route::get('/home', 'HomeController@index')->name('home');

    // verify mobile code
    Route::get('/verify', 'Auth\VerifyController@getVerify')->name('getverify');
    Route::post('/verify', 'Auth\VerifyController@postVerify')->name('verify');

    Route::any('/package', 'Auth\VerifyController@getPackages')->name('getPackages');
    Route::get('/success_package/update/{package_id}/{email}', 'Auth\LoginController@success_package')->name('success_package.update');


    Route::any('/payment/{id}', 'Auth\VerifyController@getPaymentt');
    Route::any('/addPackage', 'Auth\VerifyController@addPackage');

    // profile
    Route::any('/profile', 'HomeController@profile')->name('myProfile');
    Route::any('/editProfileInfo', 'HomeController@edit');
    Route::any('/updateProfileInfo', 'HomeController@update')->name('updateProfile');
    Route::any('/editProfileAccount', 'HomeController@editAccount');
    Route::any('/updateProfileAccount', 'HomeController@updateAccount')->name('updateAccount');

    // all chiefs
    Route::get('/showChiefs', 'Martina\IndexController@showChiefs')->name('showChiefs');

    // chief courses
    Route::get('/chiefCourses/{id}', 'Martina\IndexController@chiefCourses')->name('chiefCourses');

    // all courses
    Route::get('/showCourses', 'Martina\IndexController@showCourses')->name('showCourses');

    // add course to favorite
    Route::get('/addFavoriteCourse/{id}', 'Martina\IndexController@addFavoriteCourse')->name('addFavoriteCourse');

    // remove course to favorite
    Route::get('/removeFavoriteCourse/{id}', 'Martina\IndexController@removeFavoriteCourse')->name('removeFavoriteCourse');

    // following chief
    Route::get('/followingChieff/{id}', 'Martina\IndexController@followingChieff')->name('followingChieff');

    // unfollowing chief
    Route::get('/unFollowingChieff/{id}', 'Martina\IndexController@unFollowingChieff')->name('unFollowingChieff');

    // my courses to favorite
    Route::get('/myFavoriteCourse', 'Martina\IndexController@myFavoriteCourse')->name('myFavoriteCourse');

    // my following chiefs
    Route::get('/myFollowingChieff', 'Martina\IndexController@myFollowingChieff')->name('myFollowingChieff');

    // my courses
    Route::get('/myCourses', 'Martina\IndexController@myCourses')->name('myCourses');

    // Cief Details
    Route::get('/showChiefDetails/{id}', 'Martina\IndexController@showChiefDetails')->name('showChiefDetails');

    // Course Details
    Route::get('/showCourseDetails/{id}', 'Martina\IndexController@showCourseDetails')->name('showCourseDetails');

    // send mail to chief
    Route::any('/sendMailChief/{id}', 'Martina\IndexController@sendMailChief')->name('sendMailChief');

    // show cotact us
    Route::any('/showCotactUs', 'Martina\IndexController@showCotactUs')->name('showCotactUs');

    // send mail in cotact us
    Route::any('/sendMailCotactUs', 'Martina\IndexController@sendMailCotactUs')->name('sendMailCotactUs');

    // show lessons of courses
    Route::any('/courseLessonses/{id}/{lessonNum}', 'Martina\IndexController@courseLessonses')->name('courseLessonses');

    // Enroll Course
    Route::any('enrollCourse/{id}', 'Martina\IndexController@enrollCourse')->name('enrollCourse');

    // get Result
    // Route::any('getResult/{quizId}', 'Martina\IndexController@getResult')->name('getResult');
    // Route::post('/getResult', 'Martina\IndexController@getResult')->name('getResult');

    Route::any('isCourse/{id}', 'Martina\IndexController@isCourseCompleate');

    Route::any('/allStream', 'Martina\IndexController@getLives')->name('allStream');


    // chief routes
    Route::prefix('chief')->group(function () {
        Route::get('/', 'Users\Chief\ChiefController@index')->name('chief.dashboard');
        Route::get('/login', 'Auth\ChiefLoginController@showLoginForm')->name('chief.login');
        Route::post('/login', 'Auth\ChiefLoginController@login')->name('chief.login.submit');
        Route::get('/register', 'Auth\ChiefRegisterController@showRegisterForm')->name('chief.register');
        Route::post('/register', 'Auth\ChiefRegisterController@register')->name('chief.register.submit');

        Route::get('password-reset', 'Auth\ChiefForgetPasswordController@showForm')->name('chief.forgetpassword'); //I did not create this controller. it simply displays a view with a form to take the email
        Route::post('password-reset', 'Auth\ChiefForgetPasswordController@sendPasswordResetToken')->name('chief.password.email');
        Route::get('reset-password/{token}', 'Auth\ChiefForgetPasswordController@showPasswordResetForm');
        Route::post('reset-password/{token}', 'Auth\ChiefForgetPasswordController@resetPassword')->name('chief.password.update');
    });


    Route::prefix('admin')->group(function () {
        Route::get('/', 'Users\Admin\AdminController@index')->name('admin.dashboard');
        Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
        Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
        Route::get('/register', 'Auth\AdminRegisterController@showRegisterForm')->name('admin.register');
        Route::post('/register', 'Auth\AdminRegisterController@register')->name('admin.register.submit');

        Route::get('password-reset', 'Auth\AdminForgotPasswordController@showForm')->name('admin.password.forget'); //I did not create this controller. it simply displays a view with a form to take the email
        Route::post('password-reset', 'Auth\AdminForgotPasswordController@sendPasswordResetToken')->name('admin.password.email');
        Route::get('reset-password/{token}', 'Auth\AdminForgotPasswordController@showPasswordResetForm');
        Route::post('reset-password/{token}', 'Auth\AdminForgotPasswordController@resetPassword')->name('admin.password.update');
    });


});

Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    return 'Cache is cleared';
});

Route::get('sendCode','PaymentController@verificationCode');
Route::get('sendCodeSad','Auth\RegisterController@sad');
Route::get('testMyCode',function (){
    $res='';
    for($i=0;$i<5;$i++){
        $num1 = rand(0,9);
        $res .= strval($num1);
    }
    return $res;
});
Route::get('chargeWeb/{price}/{email}/{package_id}','Api\PaymentController@Webcharge')->name('charge.web');
Route::get('d3bis','Martina\IndexController@d3bis');
Route::get('martina/test','Martina\IndexController@martinaTest');
