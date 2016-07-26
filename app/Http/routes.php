<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::group(['middleware' => ['web']], function () {

    Route::get('/', function () {
        return view('home.index');
    });


// Authentication Routes...
    Route::get('login', 'Auth\AuthController@showLoginForm');


    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

    Route::get('/home', 'HomeController@index');

    Route::post('login', 'Auth\AuthController@login');
    Route::get('logout', 'Auth\AuthController@logout');
// Registration Routes...
    Route::get('register', 'Auth\AuthController@showRegistrationForm');
    Route::post('register', 'Auth\AuthController@register');

// Password Reset Routes...
    Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
    Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
    Route::post('password/reset', 'Auth\PasswordController@reset');


    Route::post('phone/captcha', 'Auth\AuthController@sendCaptcha');


    Route::group(['middleware' => ['auth']], function () {
        //后台首页
        Route::get('anonymous/admin', 'Admin\IndexController@index');

        //后台仪表盘
        Route::get('anonymous/admin/welcome', 'Admin\IndexController@welcome');

        //频道列表
        Route::get('anonymous/channel/index', 'Admin\ChannelController@index');
        Route::post('anonymous/channel/index', 'Admin\ChannelController@index');
        //操作频道
        Route::post('anonymous/channel/oper', 'Admin\ChannelController@oper');

        //用户列表
        Route::get('anonymous/user/index', 'Admin\UserController@index');
        Route::post('anonymous/user/index', 'Admin\UserController@index');

        //用户列表
//        Route::get('anonymous/user/index', 'Admin\UserController@index');
//        Route::post('anonymous/user/index', 'Admin\UserController@index');


        //操作用户
        Route::post('anonymous/user/oper', 'Admin\UserController@oper');

        //内容列表
        Route::get('anonymous/content/index', 'Admin\IndexController@welcome');
        //添加内容
        Route::get('anonymous/content/add', 'Admin\ContentController@add');

        //标签列表
        Route::get('anonymous/label/index', 'Admin\LabelController@index');
        Route::post('anonymous/label/index', 'Admin\LabelController@index');
        //操作标签
        Route::post('anonymous/label/oper', 'Admin\LabelController@oper');
    });


});


