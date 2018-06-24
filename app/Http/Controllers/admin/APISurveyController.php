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
       Log::Debug($json);
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

    public function getSurveyById($id){
        $app = app();
        $json = $app->make('stdClass');
        $survey = Survey::where('id',$id)->first();
        $questions = Question::where('survey_id',$survey->id)->get();
        foreach($questions as $question){
            $question->attributes = json_decode($question->attributes);

        }
        $json->surveyid = $survey->id;
        $json->title = $survey->title;
        $json->description = $survey->description;
        $json->created_at = $survey->created_at;
        $json->questions = $questions;
        return json_encode($json);

    }

    public function deleteQuestion($id){
        $question = Question::find($id);
        $question->delete();
    }

    public function deleteSurvey($id){
        $survey = Survey::find($id);
        $survey->delete();
    }

}



