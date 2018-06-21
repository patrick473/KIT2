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
}
