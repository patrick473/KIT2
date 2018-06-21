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

Auth::routes();

Route::get('/home', 'HomeController@home')->name('home');


Route::prefix('user')->group(function(){
    Route::get('/logout','Auth\LoginController@userLogout')->name('user.logout');
});

//admin group

//user group




Route::prefix('group')->group(function(){
    Route::get('/', 'GroupController@index')->name('group.index');
    Route::post('/store', 'GroupController@store')->name('group.store');
    Route::get('/invite/{id}', 'InviteController@index')->name('group.invite');
    Route::get('/accept', 'InviteController@sendInvite')->name('accept.invite');
});



Route::prefix('admin')->group(function(){
    Route::get('/content','admin\ContentController@editcontentview')->name('admin.content');
    Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login','Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@home')->name('admin.home');
    Route::get('/logout','Auth\AdminLoginController@logout')->name('admin.logout');
    Route::get('/group', 'GroupController@index')->name('admin.index.group');
    Route::post('/group/store', 'GroupController@store')->name('admin.store.group');
    Route::get('/survey/overview', 'admin\SurveyController@overview')->name('survey.overview');
    Route::get('/survey/new', 'admin\SurveyController@new')->name('survey.new');
    Route::get('/survey/{survey}', 'admin\SurveyController@detail')->name('survey.detail');
});




//Route::get('','')->name('');
