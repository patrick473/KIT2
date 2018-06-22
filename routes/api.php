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
    Route::post('/survey', 'APISurveyController@copySurvey')->name('survey.copy');  
    Route::delete('/{id}', 'GroupController@destroyGroup')->name('delete.group');
});
Route::prefix('admin')->group(function(){
    Route::post('/survey', 'admin\APISurveyController@saveSurvey')->name('survey.save');
    Route::post('/content/{page}','admin\APIContentController@savecontent')->name('edit.content');
    
   
    
});