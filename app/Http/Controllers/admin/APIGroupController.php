<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Group;
use App\User;
use App\Member;
use App\Invite;


class APIGroupController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $group = new Group;
        Group::create(['title' =>$request->title,
                      'description' => $request->description]);
        return redirect('/admin/group');
    }

    function MemberAction(Request $request, $id){

      if($request->ajax())
      {
       $output = '';
       $query = $request->get('query');
       if($query != '')
       {

          $data = User::whereNotIn('id', function($q) use($id){
            $q->select('user_id')
            ->from(with(new Member)->getTable())
            ->where('group_id','=', $id);
            })
            ->whereNotIn('id', function($q) use($id){
              $q->select('user_id')
              ->from(with(new Invite)->getTable())
              ->where('group_id','=', $id);
              })
            ->where('username', 'like', '%'.$query.'%')
            ->get();

       }
       else
       {
          $data = User::whereNotIn('id', function($q) use($id){
            $q->select('user_id')
            ->from(with(new Member)->getTable())
            ->where('group_id','=',$id);
            })
            ->whereNotIn('id', function($q) use($id){
              $q->select('user_id')
              ->from(with(new Invite)->getTable())
              ->where('group_id','=', $id);
              })
            ->orderBy('username', 'desc')
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
                   <button type="button" class="btn btn-success float-right addMember" data-user_id="'.$row->id.'">Voeg '. $row->username .' toe als member</button>
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

     function GroupAction(Request $request)
     {
      if($request->ajax())
      {
       $output = '';
       $query = $request->get('query');
       if($query != '')
       {
        $data = Group::where('title', 'like', '%'.$query.'%')
          ->get();

       }
       else
       {
        $data = Group::orderBy('title', 'desc')
          ->get();
       }
       $total_row = $data->count();
       if($total_row > 0)
       {
       $data = $data->sortBy('id');
       foreach($data as $row)
       {

         $output .= '
         <div class="card">
           <div class="card-body">
             <h5 class="card-title">'.$row->title.'</h5>
             <p class="card-text">'.$row->description.'</p>
             <div class="row">
               <div class="col align-self-start">
                 <button type="button" class="btn btn-success memberOverview" data-id="'.$row->id.'"id="memberOverview">Beheer leden</button>
               </div>
               <div class="col text-center">
                 <button type="button" class="btn btn-info surveyOverview" data-id="'.$row->id.'"id="surveyOverview">Beheer vragenlijsten</button>
               </div>
               <div class="col align-self-end">
                 <button type="button" class="btn btn-danger float-right deletebutton" data-id="'.$row->id.'"id="Delete_Group_'.$row->id.'">Verwijder groep</button>
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
           <div class="card-body">Geen groepen met deze naam gevonden.</div>
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

     public function destroyGroup($id)
     {
       $group = Group::find($id);

       $group->delete();
     }

     public function createMember($user_id, $group_id){
         $member = new Member;
         $member->user_id = $user_id;
         $member->group_id= $group_id;
         $member->group_leader = 0;
         $member->save();
       }

    public function destroyMember($id)
    {
      $member = Member::find($id);

      $member->delete();
    }


}
