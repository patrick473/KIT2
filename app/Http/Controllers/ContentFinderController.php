<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\page;

class ContentFinderController extends Controller
{

  //return content json on page
  public function findcontent($id){
    $data = page::where('id','=',$id)->first()->content;
    return $data;
  }
  public function savecontent(Request $request,$page){
    $data = $request->getContent();
    $selectedpage = page::where('id','=',$page)->first();
    $selectedpage->content = $data;
    $selectedpage->save();
    info($data);
  }
}
