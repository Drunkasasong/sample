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

Route::get('/', function () {
    return view('welcome');
});
// 主页
Route::get('/', 'StaticPagesController@home')->name('home');
// 帮助页
Route::get('/help', 'StaticPagesController@help')->name('help');
// 关于页
Route::get('/about', 'StaticPagesController@about')->name('about');
// 注册页
Route::get('signup', 'UsersController@create')->name('signup');
// 用户页
Route::resource('users', 'UsersController');
// 显示登录页
Route::get('login', 'SessionsController@create')->name('login');
// 创建新会话（登陆）
Route::post('login', 'SessionsController@store')->name('login');
// 销毁会话（退出登录）
Route::delete('logout', 'SessionsController@destroy')->name('logout');
// 激活邮箱
Route::get('signup/confirm/{token}', 'UsersController@confirmEmail')->name('confirm_email');
// 密码重设
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
// 微博相关
Route::resource('statuses', 'StatusesController', ['only' => ['store', 'destroy']]);
// 粉丝关注
Route::get('/users/{user}/followings', 'UsersController@followings')->name('users.followings');
Route::get('/users/{user}/followers', 'UsersController@followers')->name('users.followers');
// 取消关注
Route::post('/users/followers/{user}', 'FollowersController@store')->name('followers.store');
Route::delete('/users/followers/{user}', 'FollowersController@destroy')->name('followers.destroy');