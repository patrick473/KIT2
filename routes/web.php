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
Route::get('/user/logout','Auth\LoginController@userLogout')->name('user.logout');


//admin group

//user group

Route::prefix('group')->group(function(){
    Route::get('/', 'GroupController@index')->name('group.index');
    Route::post('/store', 'GroupController@store')->name('group.store');
    Route::get('/invite/{id}', 'InviteController@index')->name('group.invite');
    Route::get('/accept', 'InviteController@sendInvite')->name('accept.invite');
});

Route::prefix('survey')->group(function(){
    
});

//TODO: Delete
Route::get('/survey/new', 'admin\SurveyController@new')->name('new.survey');
Route::get('/survey/user','SurveyController@user_survey')->name('user.survey');

Route::get('/survey/view/{survey}', 'SurveyController@view_survey')->name('view.survey');
Route::get('/survey/answers/{survey}', 'SurveyController@view_survey_answers')->name('view.survey.answers');
Route::get('/survey/{survey}/delete', 'SurveyController@delete_survey')->name('delete.survey');
Route::get('/survey/{survey}/edit', 'SurveyController@edit')->name('edit.survey');
Route::patch('/survey/{survey}/update', 'SurveyController@update')->name('update.survey');
Route::post('/survey/view/{survey}/completed', 'AnswerController@store')->name('complete.survey');
Route::post('/survey/create', 'SurveyController@create')->name('create.survey');




Route::prefix('admin')->group(function(){
    Route::get('/content','admin\ContentController@editcontentview')->name('admin.content');
    Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login','Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@home')->name('admin.home');
    Route::get('/logout','Auth\AdminLoginController@logout')->name('admin.logout');
    Route::get('/group', 'AdminGroupController@index')->name('admin.index.group');
    Route::post('/group/store', 'AdminGroupController@store')->name('admin.store.group');
    Route::get('/group/members', 'AdminGroupController@member')->name('admin.group.member');
    Route::get('/survey/{survey}', 'admin\SurveyController@detail')->name('survey.detail');
});



//Route::get('','')->name('');
