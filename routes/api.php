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
Route::post('/admin/content/{page}','admin\ContentController@savecontent')->name('edit.content');
Route::get('/admin/content/{id}','ContentController@findcontent')->name('find.content');

Route::delete('/admin/group/{id}', 'AdminGroupController@destroyGroup')->name('admin.delete.group');
Route::get('/admin/group/group_action', 'AdminGroupController@GroupAction')->name('admin.live_group_search.action');
Route::get('/admin/group/member_action', 'AdminGroupController@MemberAction')->name('admin.live_member_search.action');

Route::delete('/group/{id}', 'GroupController@destroyGroup')->name('delete.group');
Route::get('/group/invite/member_action/{group_id}', 'GroupController@Members')->name('protected_member_search');
Route::post('/invite/{id}', 'GroupController@createInvite')->name('invite.member');

Route::delete('/member/{id}', 'MemberController@destroy')->name('delete.member');

Route::post('/admin/survey', 'AdminSurveyController@saveSurvey')->name('survey.save');
Route::post('/survey/answer', 'AdminSurveyController@saveAnswer')->name('survey.answer');
Route::post('/group/survey', 'AdminSurveyController@copySurvey')->name('survey.copy');
Route::get('/survey/{id}', 'AdminSurveyController@getSurveyFromGroup')->name('survey.answerform');
Route::get('/group/survey/{id}', 'AdminSurveyController@getSurveyOverview')->name('survey.overview');
Route::post('/group/invite', 'InviteController@process')->name('group.process');
