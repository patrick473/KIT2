<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
}
