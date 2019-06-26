<?php
/**
 * Created by PhpStorm.
 * User: yingwenjie
 * Date: 2019/6/25
 * Time: 11:35 AM
 */

/*
 * -------------------------------------------------------------------------
 * 后台不需要需要认证相关路由
 * -------------------------------------------------------------------------
 */
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => [], ], function () {

    # 登录
    Route::get('login', 'LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'LoginController@login');

    # 退出
    Route::get('logout', 'LoginController@logout')->name('admin.logout');

    # 无权限提示
//    Route::get('permission-denied', 'WelcomeController@permissionDenied')->name('admin.permission-denied');

});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth']],function (){
    Route::get('/', 'IndexController@index')->name('admin');
    Route::get('index', 'IndexController@index')->name('admin.index');
    Route::get('welcome', 'IndexController@welcome')->name('index.welcome');
});