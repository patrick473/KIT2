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
    $app = app();
    $jsonObject = $app->make('stdClass');
   
    $json = json_decode($request->getContent(),true);
    $survey ;
    if( isset($json['id'])){
        $survey = Survey::where('id','=',$json['id'])->first();
        $survey->title = $json['title'];
        $survey->description = $json['description'];
        $survey->save();
        Log::debug('id is set');
    }
    else{
    $survey = Survey::create([
        'title' => $json['title'],
        'description' => $json['description']
    ]);
    Log::debug('id is not set');
    }
    Log::debug(json_decode( json_encode($survey), true));
    $questions = collect([]);
    
    foreach($json['questions'] as $question){
        if(isset($question['id'])){

        $saveablequestion = Question::where('id',$question['id'])->first();
        $saveablequestion->type = $question['type'];
        $saveablequestion->title = $question['title'];
        $saveablequestion->attributes = json_encode($question['attributes']);
        $saveablequestion->save();
        
        $questions->push($saveablequestion);
        }
        else{
        $saveablequestion = Question::create([
            'survey_id' => $survey['id'],
            'type' => $question['type'],
            'title' => $question['title'],
            'attributes' => json_encode($question['attributes'])
        ]);
        $questions->push($saveablequestion);
        }
    } 
    $jsonObject->title = $survey->title;
    $jsonObject->description = $survey->description;
    $jsonObject->id = $survey->id;
    $jsonObject->questions = $questions;
    foreach($jsonObject->questions as $question){
        $question->attributes = json_decode($question->attributes);
        
    }
    return json_encode($jsonObject);
    

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
    public function getSurveyOverview($id){
        $app = app();
        //get variables
        $jsonObject = $app->make('stdClass');
        $groupSurvey = survey_group::where('id',$id)->first();
        $survey = Survey::where('id',$groupSurvey->survey_id)->first();
        $questions = Question::where('survey_id',$groupSurvey->survey_id)->get();
        foreach($questions as $question){
            $question->attributes = json_decode($question->attributes);
            
        }
        $answers = Answer::where('survey_id',$id)->get();
        foreach($answers as $answer){
            $answer->answers = json_decode($answer->answers);
        }
        //get individual answer per answer form and sort it by question
        foreach($questions as $question){
            $questionanswers = collect([]);
            foreach($answers as $answer){
                
                foreach($answer->answers as $questionAnswer){
                    if( $question->id == $questionAnswer->id){
                        $answerObject = $app->make('stdClass');
                        $answerObject->user = $answer->user_id;
                        $answerObject->value = $questionAnswer->value;
                        $questionanswers->push($answerObject);
                    }
                }
            }
            $question->answers = $questionanswers;
        }
        
        //add answers to question

        //construct object to be responded with
        $jsonObject->survey = $groupSurvey->survey_id;
        $jsonObject->title = $survey->title;
        $jsonObject->description = $survey->description;
        $jsonObject->group = $groupSurvey->group_id;

        $jsonObject->questions = $questions;
        
       
        return json_encode($jsonObject);
    }

   }



