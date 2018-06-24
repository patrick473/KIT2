<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Survey;
use App\Answer;
use App\Group;
use App\Member;
use App\survey_group;
use App\User;
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
  public function selectSurvey($group_id){
      return view('admin.group.selectSurvey',compact('group_id'));
    }

    public function surveyOverview($id){

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

        return view('admin.group.surveyOverview',compact(['surveys', 'members', 'firstMember', 'groupLeader', 'id']));

    }

}
