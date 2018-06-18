<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Log;
use Auth;
use App\Survey;
use App\Answer;
use App\Question;
use App\survey_group;


use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
class AdminSurveyController extends Controller
{
 




   public function saveSurvey(Request $request){

    //get json
    $json = json_decode($request->getContent(),true);

    $survey = Survey::create([
        'title' => $json['title'],
        'description' => $json['description']
    ]);
    
    foreach($json['questions'] as $question){
        $saveablequestion = Question::create([
            'survey_id' => $survey['id'],
            'type' => $question['type'],
            'title' => $question['title'],
            'attributes' => json_encode($question['attributes'])
        ]);
    } 

    Log::debug($json['title']);
    // make json into eloquent objects
    
    //save to database

   }
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























}
