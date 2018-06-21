<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\page;
class APIContentController extends Controller
{

  
   
  //save content json to correct page
  public function savecontent(Request $request,$page){
    $data = $request->getContent();
    $selectedpage = page::where('id','=',$page)->first();
    $selectedpage->content = $data;
    $selectedpage->save();
    info($data);
  }

}
