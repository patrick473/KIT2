<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invite;
use App\Mail\InviteCreated;
use App\User;
use App\Group;
use App\Member;
use Log;
class InviteController extends Controller
{

  public function index($group_id){
    $invites = Invite::where('group_id', '=', $group_id)->get();

    foreach($invites as $invite){
            $invite->users = User::where('id',$invite->user_id)->get();
    }

    $members = Member::where('group_id', '=', $group_id)->where('group_leader', '!=', 1)->get();

    foreach($members as $member){
            $member->users = User::where('id',$member->user_id)->get();
    }

    return view('group.invite', compact(['group_id', 'invites', 'members']));
  }

  public function sendInvite(){
    //TODO: USER ID IS HARD CODED still
    $user_id = 2;
    $user = User::where('id', '=', $user_id)->first();
    $user->invites = Invite::where('user_id',$user->id)->get();

    if(!$user->invites->isEmpty()){
      foreach($user->invites as $invite){
              $invite->groups = Group::where('id',$invite->group_id)->get();
      }
    }

    return view('group.accept', compact('user'));
  }

  public function destroy($id){
    $invite = Invite::find($id);

    $invite->delete();
  }

  public function accept($invite_id){
    $invite = Invite::where('id', '=', $invite_id)->first();

    $member = new Member;
    $member->user_id = $invite->user_id;
    $member->group_id = $invite->group_id;
    $member->group_leader = 0;
    $member->save();

    $invite = Invite::find($invite_id);

    $invite->delete();
  }

  public function store($user_id, $group_id){
    $result = Invite::where('user_id','=',$user_id)
      ->where('group_id', '=', $group_id)
      ->get();

    if(!$result->isEmpty()){
      //second fail safe. Not really necesarry
      return redirect()->route('group.invite', ['id' => $group_id]);
    }
    else{
      $invite = new Invite;
      $invite->user_id = $user_id;
      $invite->group_id= $group_id;
      $invite->save();
    }

    return redirect()->route('group.invite', ['id' => $group_id]);
  }

}
