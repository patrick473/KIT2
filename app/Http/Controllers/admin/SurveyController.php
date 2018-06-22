<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Survey;
use App\Answer;
use Log;
use App\Http\Requests;

use Illuminate\Support\Facades\Redirect;
class SurveyController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth:admin');
  }

  
  public function detail($survey){
    return view('survey.detail',compact('survey'));
  }
  public function new(){
    return view('survey.new');
  }
  public function overview(){
    $surveys = Survey::all();
    return view('survey.overview',compact('surveys'));
  }
  
}
