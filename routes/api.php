<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/admin/content/{page}','ContentController@savecontent')->name('edit.content');
Route::get('/admin/content/{id}','ContentController@findcontent')->name('find.content');

Route::delete('/group/{id}', 'GroupController@destroyGroup')->name('delete.group');
Route::get('/group/group_action', 'GroupController@GroupAction')->name('live_group_search.action');
Route::get('/group/member_action', 'GroupController@MemberAction')->name('live_member_search.action');

Route::post('/admin/survey', 'AdminSurveyController@saveSurvey')->name('survey.save');
Route::post('/survey/answer', 'AdminSurveyController@saveAnswer')->name('survey.answer');
Route::post('/group/survey', 'AdminSurveyController@copySurvey')->name('survey.copy');
Route::get('/group/survey/{id}', 'AdminSurveyController@getSurveyOverview')->name('survey.overview');