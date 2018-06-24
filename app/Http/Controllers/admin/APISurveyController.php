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

  public function copySurvey($group_id, $survey_id){
      $groupSurvey = survey_group::create([
          'group_id' => $group_id,
          'survey_id' => $survey_id
      ]);
      return $groupSurvey->id;
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
                 <button type="button" class="btn btn-success float-right addSurvey" data-survey_id="'.$row->id.'">Voeg survey toe aan groep</button>
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
        $json->updated_at = $survey->updated_at;
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

    public function destroySurveyGroup($survey_id, $group_id){
      $survey = survey_group::where('survey_id', '=', $survey_id)->where('group_id', '=', $group_id)->first();

      $survey->delete();

    }

}
