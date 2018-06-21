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

  public function destroy($id){
    $invite = Invite::find($id);

    $invite->delete();
  }









  //TODO: verwijderen???
//     public function something()
// {
//     return view('group.invite');
// }
//
// public function process(Request $request)
// {
//     $json = json_decode($request->getContent(),true);
//     // in json the following things need to be included: recipient id,leader id
//     // process the form submission and send the invite by email
//     //username
//     do {
//         //generate a random string using Laravel's str_random helper
//         $token = str_random();
//     } //check if the token already exists and if it does, try again
//     while (Invite::where('token', $token)->first());
//
//     //get users and groupname
//
//     $user1 = User::where('id',$json['user1']);
//     $user2 = User::where('id',$json['user2']);
//     $group = Group::where('id',$json['group']);
//
//     Log::debug($user1);
//     //create a new invite record
//     $invite = Invite::create([
//         'email' => $json['email'],
//         'token' => $token,
//         'user_id' => $user1->id,
//         'group_id' => $group->id,
//         'user1name' => $user1->username,
//         'user2name' => $user2->username,
//         'groupname' => $group->title
//     ]);
//
//     // send the email
//     Mail::to($invite->email)->send('emails.invite', array('invite'->$invite))->subject('je bent uitgenodigd om een groep te joinen');
//
//     // redirect back where we came from
//     return redirect()
//         ->back();
// }
//
// public function accept($token)
// {
//
//     if (!$invite = Invite::where('token', $token)->first()) {
//         //if the invite doesn't exist do something more graceful than this
//         abort(404);
//     }
//
//     // create the user with the details from the invite
//     Member::create([
//         'group_id' => $invite->group_id,
//         'user_id' => $invite->user_id,
//         'group_leader' => 0
//     ]);
//
//     // delete the invite so it can't be used again
//     $invite->delete();
//
//     // here you would probably log the user in and show them the dashboard, but we'll just prove it worked
//
//     return 'Good job! Invite accepted!';
// }
}
