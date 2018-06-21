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

Route::delete('/group/{id}', 'GroupController@destroyGroup')->name('delete.group');
Route::get('/group/invite/member_action/{id}', 'MemberController@Members')->name('protected_member_search');
Route::post('/invite/member/{user_id}/{group_id}', 'InviteController@store')->name('invite.member');
Route::post('/invite/accept/{invite_id}', 'InviteController@accept')->name('invite.to.member');
Route::delete('/invite/{id}', 'InviteController@destroy')->name('delete.invite');

Route::delete('/member/{id}', 'MemberController@destroy')->name('delete.member');


Route::post('/survey/answer', 'APISurveyController@saveAnswer')->name('survey.answer');
Route::post('/group/survey', 'APISurveyController@copySurvey')->name('survey.copy');
Route::get('/survey/{id}', 'APISurveyController@getSurveyFromGroup')->name('survey.fillanswerpage');
Route::get('/group/survey/{id}', 'APISurveyController@getSurveyOverview')->name('survey.overview');
Route::post('/group/invite', 'InviteController@process')->name('group.process');
Route::get('/content/{id}','ContentFinderController@findcontent')->name('find.content');

Route::prefix('admin')->group(function(){
    Route::post('/survey', 'admin\APISurveyController@saveSurvey')->name('survey.save');
    Route::post('/content/{page}','admin\APIContentController@savecontent')->name('edit.content');
    Route::delete('/group/{id}', 'AdminGroupController@destroyGroup')->name('admin.delete.group');
    Route::get('/group/group_action', 'AdminGroupController@GroupAction')->name('admin.live_group_search.action');
    Route::get('/group/member_action', 'AdminGroupController@MemberAction')->name('admin.live_member_search.action');
    
});