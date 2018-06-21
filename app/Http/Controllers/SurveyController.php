<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Survey;
use App\Answer;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
class SurveyController extends Controller
{
  

#view returners
     # Show page to create new survey
  public function new_survey()
  {
    return view('survey.new');
  }
  # Show own surveys page
  public function user_survey(){

    $user = Auth::user();
    $surveys = Survey::where('user_id','=',$user->id)->get();
    return view('survey.user',compact('surveys'));
  }

   # retrieve detail page and add questions here
   public function detail_survey(Survey $survey)
   {
     $survey->load('questions.user');
     return view('survey.detail', compact('survey'));
   }

  # Show edit survey
  public function edit(Survey $survey)
  {
    return view('survey.edit', compact('survey'));
  }
  # view survey publicly and complete survey
  public function view_survey(Survey $survey)
  {
    $survey->option_name = unserialize($survey->option_name);
    return view('survey.view', compact('survey'));
  }

  # view submitted answers from current logged in user
  public function view_survey_answers(Survey $survey)
  {
    $survey->load('user.questions.answers');
    return view('answer.view', compact('survey'));
  }

  #Create,Update Delete
  public function create(Request $request)
  {
    $arr = $request->all();
    // $request->all()['user_id'] = Auth::id();
    $arr['user_id'] = Auth::id();
    $surveyItem = $survey->create($arr);
    return Redirect::to("/survey/{$surveyItem->id}");
  }
   # edit survey
   public function update(Request $request, Survey $survey)
   {
     $survey->update($request->only(['title', 'description']));
     return redirect()->action('SurveyController@detail_survey', [$survey->id]);
   }
   public function delete_survey(Survey $survey)
   {
     $survey->delete();
     return redirect('');
   }
   public function answer(Survey $survey)
   {
     return view('answersurvey.answer');
   }
}
