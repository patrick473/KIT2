<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\page;
class ContentController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth:admin');
  }
    public function editcontentview()
  {
    return view('admin.content');
  }
  //save content json to correct page
  public function savecontent(Request $request,$page){
    $data = $request->getContent();
    $selectedpage = page::where('id','=',$page)->first();
    $selectedpage->content = $data;
    $selectedpage->save();
    info($data);
  }

}
