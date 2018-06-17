<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;

class GroupController extends Controller
{

  public function new_group(){

  }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('group.groupIndex');
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
      $group = App\Group::find($id);

      $group->delete();
    }

    function action(Request $request)
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
        // $output .= '
        // <tr>
        //  <td>'.$row->id.'</td>
        //  <td>'.$row->title.'</td>
        // </tr>
        // ';

        $output .= '
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">'.$row->id.'. '.$row->title.'</h5>
            <p class="card-text">'.$row->description.'</p>
            <form method="delete" action="/api/group/{'.$row->id.'}">
            <button type="submit" class="btn btn-danger" id="Group_'.$row->id.'">Verwijder groep</button>
            </form>
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
}
