<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Group;
use App\Member;
use App\User;
use App\survey_group;

class GroupController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth:admin');
  }

    public function member(){
        return view('admin.group.members');
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('admin.group.groupIndex');
  }

  public function GroupMemberOverview($id){
    $members = Member::where('group_id', '=', $id)->where('group_leader', '!=', 1)->get();

    foreach($members as $member){
            $member->users = User::where('id',$member->user_id)->get();
    }

    return view('admin.group.GroupMemberOverview', compact(['id', 'invites', 'members']));
  }

  public function store(Request $request)
  {
      $group = new Group;
      $group->title = $request->title;
      $group->description = $request->description;
      $group->save();

      $member = new Member;
      $member->group_id = $group->id;
      //TODO: $user_id replacen met non hard coded id!!!
      $user_id=1;
      $member->user_id = $user_id;
      $member->group_leader = 1;
      $member->save();
      return redirect('/admin/group');
  }
}
