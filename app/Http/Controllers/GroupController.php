<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Group;
use \App\Member;
use \App\User;
use Log;

class GroupController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    //TODO: $user_id is still hard coded
    $user_id=1;
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
       $user_id=1;
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

  function Members(Request $request, $group_id){
    if($request->ajax())
    {
     $output = '';
     $query = $request->get('query');
     if($query != '')
     {
      $data = User::join('members', 'members.user_id', '=', 'users.id')
        ->where('username', 'like', '%'.$query.'%')
        ->where('members.group_id', '!=', $group_id)
        ->get();

     }
     else
     {
      $data = User::orderBy('username', 'desc')
        ->get();
     }
     $total_row = $data->count();
     if($total_row > 0)
     {
     $data = $data->sortBy('username');
     foreach($data as $row)
     {

       $output .= '
       <div class="card">
         <div class="card-body">
           <h5 class="card-title">'.$row->username.'</h5>
             <div class="row">
               <div class="col align-self-end">
                 <button type="button" class="btn btn-success float-right memberInvitebutton" data-id="'.$row->id.'">Nodig '. $row->username .' uit</button>
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
          <h5 class="card-title">Geen gebruikers met deze naam gevonden.</h5>
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

   public function invite($group_id){
     return view('group.invite', compact('group_id'));
   }
}
