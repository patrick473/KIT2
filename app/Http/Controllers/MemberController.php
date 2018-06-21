<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\Member;
use \App\Group;
use \App\User;
use \App\Invite;
use Log;

class MemberController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {

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
  public function destroy($id)
  {
    $member = Member::find($id);

    $member->delete();
  }

  function Members(Request $request, $id){

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
                 <button type="button" class="btn btn-success float-right memberInvitebutton" data-user_id="'.$row->id.'">Nodig '. $row->username .' uit</button>
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
}
