<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Survey;
use App\Answer;
use App\Question;
use App\Group;
use App\Member;
use App\User;
use Auth;
use Log;
use App\survey_group;
class SurveyController extends Controller
{
      public function surveyAnswers($id){
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
            $answer->answers = json_decode($answer->answers,true);
            
        }
        //get individual answer per answer form and sort it by question
        foreach($questions as $question){
            $questionanswers = collect([]);
            foreach($answers as $answer){

                foreach($answer->answers as $questionAnswer){
                  
                    $questionAnswer = array_first($questionAnswer);
                    Log::debug('new answer');
                    Log::debug($questionAnswer);
                        Log::debug($question->id);
                        Log::debug($questionAnswer['id']);
                    if( $question->id == $questionAnswer['id']){

                        $answerObject = $app->make('stdClass');
                        $answerObject->userid = $answer->user_id;
                        $answerObject->user= User::where('id',$answer->user_id)->first();
                        $answerObject->value = $questionAnswer['value'];
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
        dd($jsonObject);
        return view('group.surveyAnswers', compact('id'))->with(['survey'=>$jsonObject]);
    }

    public function surveyoverview($group_id){
        return view('group.selectSurvey',compact('group_id'));
      }

    public function groupSurveys($id){

        $group = Group::where('id',$id)->first();
        $surveysgroup = survey_group::where('group_id',$id)->get();
        $surveys = collect([]);
        foreach($surveysgroup as $surveygroup){
            $survey = Survey::where('id',$surveygroup->survey_id)->first();
            $survey->groupsurvey = $surveygroup->id;
            $surveys->push($survey);
        }

        $members = Member::where('group_id', '=', $id)->orderBy('group_leader', 'DESC')->get();

        foreach($members as $member){
                $member->users = User::where('id',$member->user_id)->get();
        }

        $groupLeader = $members->firstWhere('group_leader', '1');
        $firstMember = $members->firstWhere('group_leader', '0');
        $currentUser = Auth::id();

        return view('group.surveyOverview',compact(['surveys', 'members', 'firstMember', 'groupLeader', 'id', 'currentUser']));

    }
    public function getSurvey($surveyid){



            return view('survey.answer',compact('surveyid'));
    }
    public function selectsurvey($group_id){

        return view('group.selectSurvey',compact('group_id'));
    }
}
