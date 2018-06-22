<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Log;
use Auth;
use App\Survey;
use App\Answer;
use App\Question;
use App\survey_group;

class APISurveyController extends Controller
{
     
    public function copySurvey(Request $request){
        $json = json_decode($request->getContent(),true);
        $groupSurvey = survey_group::create([
            'group_id' => $json['group_id'],
            'survey_id' => $json['survey_id']
        ]);
   }

   
   public function saveAnswer(Request $request){
    $json = json_decode($request->getContent(),true);
    $answer = Answer::create([
        'user_id' => $json['user_id'],
        'survey_id' => $json['survey_id'],
        'answers' => json_encode($json['answers'])
    ]);

    }



public function getSurveyFromGroup($id){
    $app = app();
    $jsonObject = $app->make('stdClass');
    $groupSurvey = survey_group::where('id',$id)->first();
    Log::debug($groupSurvey);
    $survey = Survey::where('id',$groupSurvey->survey_id)->first();
    $questions = Question::where('survey_id',$groupSurvey->survey_id)->get();
    foreach($questions as $question){
        $question->attributes = json_decode($question->attributes);
        
    }
    $jsonObject->surveyid = $groupSurvey->survey_id;
    $jsonObject->title = $survey->title;
    $jsonObject->description = $survey->description;
    $jsonObject->group = $groupSurvey->group_id;
    $jsonObject->questions = $questions;
    return json_encode($jsonObject);

}

//TODO: Add function to get survey by id
public function getSurveyById($id){

}





}
