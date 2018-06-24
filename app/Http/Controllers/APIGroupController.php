<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Group;
use \App\User;

class APIGroupController extends Controller
{



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

    /**function MemberAction(Request $request){
      if($request->ajax())
      {
       $output = '';
       $query = $request->get('query');
       if($query != '')
       {
        $data = User::where('username', 'like', '%'.$query.'%')
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
             <p class="card-text">'.$row->email.'</p>
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
           <div class="card-body">Geen gebruikers met deze naam gevonden.</div>
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
                <button type="button" class="btn btn-success" data-id="'.$row->id.'"id="Add_Group_'.$row->id.'">Voeg leden toe</button>
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
   }**/
}
