<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Log;
use Auth;
use App\Survey;
use App\Answer;
use App\Question;
use App\survey_group;


use App\Http\Requests;

use Illuminate\Support\Facades\Redirect;
class APISurveyController extends Controller
{
 




   public function saveSurvey(Request $request){
    $app = app();
    $jsonObject = $app->make('stdClass');
   
    $json = json_decode($request->getContent(),true);
    if( isset($json['id'])){
        $survey = Survey::where('id','=',$json['id'])->first();
        $survey->title = $json['title'];
        $survey->description = $json['description'];
        $survey->save();
    }
    else{
        
    $survey = Survey::create([
        'title' => $json['title'],
        'description' => $json['description']
    ]);
    }
    $questions = collect([]);
    
    foreach($json['questions'] as $question){
        if(isset($question['id'])){

        $saveablequestion = Question::where('id',$question['id'])->first();
        $saveablequestion->type = $question['type'];
        $saveablequestion->title = $question['title'];
        $saveablequestion->description = $question['description'];
        $saveablequestion->attributes = json_encode($question['attributes']);
        $saveablequestion->save();
        
        $questions->push($saveablequestion);
        }
        else{
        $saveablequestion = Question::create([
            'survey_id' => $survey['id'],
            'type' => $question['type'],
            'title' => $question['title'],
            'description' => $question['description'],
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





 


   }



