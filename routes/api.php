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

Route::prefix('member')->group(function(){
    Route::delete('/{id}', 'APIMemberController@destroy')->name('delete.member');
});
Route::prefix('survey')->group(function(){
    Route::post('/answer', 'APISurveyController@saveAnswer')->name('survey.answer');
    Route::get('/{id}', 'APISurveyController@getSurveyFromGroup')->name('survey.fillanswerpage');
    Route::get('/select/{group_id}', 'APISurveyController@surveySearch')->name('survey.search');
    Route::get('/surveyGroup/{survey_id}/{group_id}', "APISurveyController@destroySurveyGroup")->name('destroy.surveyGroup');
});
Route::prefix('content')->group(function(){
    Route::get('/{id}','ContentFinderController@findcontent')->name('find.content');
});

Route::prefix('invite')->group(function(){
    Route::post('/member/{user_id}/{group_id}', 'InviteController@store')->name('invite.member');
    Route::post('/accept/{invite_id}', 'InviteController@accept')->name('invite.to.member');
    Route::delete('/{id}', 'InviteController@destroy')->name('delete.invite');
});

Route::prefix('group')->group(function(){
    Route::get('/group_action', 'APIGroupController@GroupAction')->name('group.search');
    Route::get('/member_action', 'APIGroupController@MemberAction')->name('group.searchmember');

    Route::get('/invite/member_action/{id}', 'APIMemberController@Members')->name('protected_member_search');
    Route::post('/invite', 'InviteController@process')->name('group.process');
    Route::post('/survey/{group_id}/{survey_id}', 'APISurveyController@copySurvey')->name('survey.copy');
    Route::delete('/{id}', 'GroupController@destroyGroup')->name('delete.group');
});
Route::prefix('admin')->group(function(){
    Route::post('/survey', 'admin\APISurveyController@saveSurvey')->name('survey.save');
    Route::get('/survey/{id}', 'admin\APISurveyController@getSurveyById')->name('survey.getSurvey');
    Route::delete('/survey/{id}', 'admin\APISurveyController@deleteSurvey')->name('survey.deleteSurvey');
    Route::delete('/question/{id}', 'admin\APISurveyController@deleteQuestion')->name('survey.deleteQuestion');
    Route::post('/content/{page}','ContentFinderController@savecontent')->name('edit.content');
    Route::get('/content/{page}','ContentFinderController@findcontent')->name('edit.content');
    Route::get('/group/group_action', 'admin\APIGroupController@GroupAction')->name('group.searchgroup');
    Route::get('/member/member_action/{id}', 'admin\APIGroupController@MemberAction')->name('group.searchmember');
    Route::delete('/group/{id}', 'admin\APIGroupController@destroyGroup')->name('delete.group');
    Route::post('/group/member/{user_id}/{group_id}', 'admin\APIGroupController@createMember')->name('invite.member');
    Route::delete('/member/{id}', 'admin\APIGroupController@destroyMember')->name('delete.member');
    Route::get('/select/{group_id}', 'admin\APISurveyController@surveySearch')->name('survey.search');
    Route::get('/surveyGroup/{survey_id}/{group_id}', "admin\APISurveyController@destroySurveyGroup")->name('destroy.surveyGroup');
    Route::post('/survey/{group_id}/{survey_id}', 'admin\APISurveyController@copySurvey')->name('survey.copy');
});
