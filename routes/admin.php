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
    Route::resource('users', 'UsersController')->middleware(['role:Maintainer','permission:manage_users']);

    //权限
    Route::resource('permissions', 'PermissionsController');

    //角色
    Route::resource('roles', 'RolesController');

    //菜单
    Route::resource('menus', 'MenusController');

    //站点设置
    Route::resource('sites', 'SitesController');
    Route::post('sites/save', 'SitesController@save')->name('sites.save');

    //分类设置
    Route::resource('categories', 'CategoriesController');

    //单页设置
    Route::resource('pages', 'PagesController');

    //文章设置
    Route::resource('articles', 'ArticlesController');

    //产品设置
    Route::resource('products', 'ProductsController');

    //留言设置
    Route::resource('messages', 'MessagesController');

    //公共
    //文件上传
    Route::post('common/upload', 'CommonController@upload')->name('common.upload');

    //会员
    Route::get('members/getName', 'MembersController@getName')->name('members.getName');
    Route::resource('members', 'MembersController');
    Route::put('members/change/{member}', 'MembersController@change')->name('members.change');
    Route::put('members/setParent/{member}', 'MembersController@setParent')->name('members.setParent');

    //会员角色
    Route::resource('member_roles', 'MemberRolesController');

    //会员晋升
    Route::resource('member_promotes', 'MemberPromotesController');

    //返佣制度
    Route::resource('rebates', 'RebatesController');

    //首单鼓励制度
    Route::resource('encouragements', 'EncouragementsController');

});