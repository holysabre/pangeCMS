<?php
/**
 * Created by PhpStorm.
 * User: yingwenjie
 * Date: 2019/6/25
 * Time: 11:35 AM
 */

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'],function (){
    Route::get('login', 'UsersController@login')->name('users.login');
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'],function (){
    Route::get('/', 'IndexController@index');
    Route::get('index', 'IndexController@index');
    Route::get('welcome', 'IndexController@welcome')->name('index.welcome');
});