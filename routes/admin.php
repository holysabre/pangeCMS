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


/*
 * -------------------------------------------------------------------------
 * 后台需要认证相关路由
 * -------------------------------------------------------------------------
 */
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth']],function (){

    //首页
    Route::get('/', 'IndexController@index')->name('admin');
    Route::get('index', 'IndexController@index')->name('admin.index');
    //欢迎页
    Route::get('welcome', 'IndexController@welcome')->name('index.welcome');

    //会员
    Route::resource('users', 'UsersController');

    //权限
    Route::resource('permissions', 'PermissionsController');

    //角色
    Route::resource('roles', 'RolesController');

    //菜单
    Route::resource('menus', 'MenusController');
    Route::get('data', 'MenusController@data')->name('admin.menus.data');
    Route::delete('menus/destroy', 'MenusController@destroy')->name('admin.menus.destroy');

    //站点你设置
    Route::resource('settings', 'SettingsController');

});