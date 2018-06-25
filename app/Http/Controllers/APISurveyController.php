<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Log;
use Auth;
use Session;
use App\Survey;
use App\Answer;
use App\Question;
use App\survey_group;

class APISurveyController extends Controller
{

    public function copySurvey($group_id, $survey_id){
        $groupSurvey = survey_group::create([
            'group_id' => $group_id,
            'survey_id' => $survey_id
        ]);
        return $groupSurvey->id;
   }


   public function saveAnswer(Request $request){
    $json = json_decode($request->getContent(),true);
    $app = app();
    $answers = $app->make('stdClass');
    $answers->answers= $json['answers'];
    $answer = Answer::create([
        'user_id' => $json['user_id'],
        'survey_id' => $json['survey_id'],
        'answers' => json_encode($answers)
    ]);

    }



public function getSurveyFromGroup($id){
    $app = app();
    $jsonObject = $app->make('stdClass');
    $groupSurvey = survey_group::where('id',$id)->first();
    
    $survey = Survey::where('id',$groupSurvey->survey_id)->first();
    Log::debug($survey);
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

function surveySearch(Request $request, $group_id){
  if($request->ajax())
  {
   $output = '';
   $query = $request->get('query');
   if($query != '')
   {

     $surveys = Survey::whereNotIn('id', function($q) use($group_id){
       $q->select('survey_id')
       ->from(with(new survey_group)->getTable())
       ->where('group_id','=',$group_id);
       })
       ->where('title', 'like', '%'.$query.'%')
       ->get();

   }
   else
   {

     $surveys = Survey::whereNotIn('id', function($q) use($group_id){
       $q->select('survey_id')
       ->from(with(new survey_group)->getTable())
       ->where('group_id','=',$group_id);
       })
       ->orderBy('title', 'desc')
       ->get();

   }
   $total_row = $surveys->count();
   if($total_row > 0)
   {
   $surveys = $surveys->sortBy('title');
   foreach($surveys as $row)
   {

     $output .= '
     <div class="card">
       <div class="card-body REMOVEME">
         <h5 class="card-title">'.$row->title.'</h5>
           <div class="row">
             <div class="col align-self-end">
               <button type="button" class="btn btn-success float-right addSurvey" data-survey_id="'.$row->id.'">Voeg vragenlijst toe aan groep</button>
             </div>
           </div>
         </div>
       </div>
     </div>
     ';

    }
   }
   else
   {
     $output .= '
     <div class="card">
       <div class="card-body">
        <h5 class="card-title">Geen surveys gevonden.</h5>
       </div>
     </div>
     ';
   }
   $data = array(
    'table_data'  => $output,
    'total_data'  => $total_row
   );

   echo json_encode($data);
  }
}

public function destroySurveyGroup($survey_id, $group_id){
  $survey = survey_group::where('survey_id', '=', $survey_id)->where('group_id', '=', $group_id)->first();

  $survey->delete();

}

}
