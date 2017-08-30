<?php

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

Route::group(['namespace' => 'Auth' , 'middleware' => 'checkSuperAdmin'] , function (){
    // Registration Routes...
    $this->get('register', 'RegisterController@showRegistrationForm')->name('register');
    $this->post('register', 'RegisterController@register');
});


Route::group( [ 'namespace' => 'Auth' ] , function () {
    // Authentication Routes...
    $this->get('login', 'LoginController@showLoginForm')->name('login');
    $this->post('login', 'LoginController@login');
    $this->get('logout', 'LoginController@logout')->name('logout');

// Password Reset Routes...
    $this->get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
    $this->post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    $this->get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
    $this->post('password/reset', 'ResetPasswordController@reset');
});

Route::get('/', function () {
    return redirect(route('admin.panel'));
});

Route::group( [ 'prefix' => 'admin' , 'namespace' => 'Admin' , 'middleware' => 'auth' ] , function () {
    $this->get('/panel' , 'PanelController@index')->name('admin.panel');
    $this->get('/panel/profile' , 'PanelController@profile')->name('user.profile');
    $this->post('/panel/profile/{user}' , 'PanelController@update')->name('user.profile.update');
    Route::resource('students', 'StudentController');
});

