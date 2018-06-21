<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function detail($survey){
        return view('survey.detail',compact('survey'));
      }
      public function new(){
        return view('survey.new');
      }
      public function overview(){
        $surveys = Survey::all();
        dd($surveys);
        return view('survey.overview',compact('surveys'));
      }
}
