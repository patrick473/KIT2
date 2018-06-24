<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Group;
use \App\Member;
use \App\User;
use Log;
use Auth;

class GroupController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */

  public function __construct()
  {
    $this->middleware('auth');
  }
  public function index()
  {
    $user_id=Auth::id();
    $members = Member::where('user_id', '=', $user_id)->get();
    // Log::debug($members);
    // dd($members);
    foreach($members as $member){

            $member->groups = Group::where('id',$member->group_id)->get();
    }
    return view('group.groupIndex', compact('members'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
   public function store(Request $request)
   {
       $group = new Group;
       $group->title = $request->title;
       $group->description = $request->description;
       $group->save();

       $member = new Member;
       $member->group_id = $group->id;
       //TODO: $user_id replacen met non hard coded id!!!
       $user_id=Auth::id();
       $member->user_id = $user_id;
       $member->group_leader = 1;
       $member->save();
       return redirect('/group');
   }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
      //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
      //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
      //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroyGroup($id)
  {
    $group = Group::find($id);

    $group->delete();
  }

   public function invite($group_id){
     return view('group.invite', compact('group_id'));
   }
}
