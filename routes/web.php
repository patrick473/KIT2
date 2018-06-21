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
Route::get('/admin/group', 'AdminGroupController@index')->name('admin.index.group');
Route::post('/admin/group/store', 'AdminGroupController@store')->name('admin.store.group');
Route::get('/admin/group/members', 'AdminGroupController@member')->name('admin.group.member');

//user group
Route::get('/group', 'GroupController@index')->name('group.index');
Route::post('/group/store', 'GroupController@store')->name('group.store');
Route::get('/group/invite/{id}', 'InviteController@index')->name('group.invite');

// {token} is a required parameter that will be exposed to us in the controller method
Route::get('accept/{token}', 'InviteController@accept')->name('group.accept');
















//TODO: Delete
Route::get('/survey/new', 'SurveyController@new_survey')->name('new.survey');
Route::get('/survey/user','SurveyController@user_survey')->name('user.survey');
Route::get('/survey/{survey}', 'SurveyController@detail_survey')->name('detail.survey');
Route::get('/survey/view/{survey}', 'SurveyController@view_survey')->name('view.survey');
Route::get('/survey/answers/{survey}', 'SurveyController@view_survey_answers')->name('view.survey.answers');
Route::get('/survey/{survey}/delete', 'SurveyController@delete_survey')->name('delete.survey');
Route::get('/survey/{survey}/edit', 'SurveyController@edit')->name('edit.survey');
Route::patch('/survey/{survey}/update', 'SurveyController@update')->name('update.survey');
Route::post('/survey/view/{survey}/completed', 'AnswerController@store')->name('complete.survey');
Route::post('/survey/create', 'SurveyController@create')->name('create.survey');

//till here

// Survey

Route::get('/answer', 'SurveyController@answer')->name('answer.survey');
Route::post('/answer/{id}', 'AnswerController@storeanswer')->name('answer.store');
// Questions related
Route::post('/survey/{survey}/questions', 'QuestionController@store')->name('store.question');
Route::get('/question/{question}/edit', 'QuestionController@edit')->name('edit.question');
Route::patch('/question/{question}/update', 'QuestionController@update')->name('update.question');

//ADMINSECTION


Route::prefix('admin')->group(function(){
    Route::get('/content','admin\ContentController@editcontentview')->name('admin.content');
    Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login','Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@home')->name('admin.home');
    Route::get('/logout','Auth\AdminLoginController@logout')->name('admin.logout');
});



//Route::get('','')->name('');
