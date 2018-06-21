<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


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
   
    
}
