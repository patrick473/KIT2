<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\page;
class ContentController extends Controller
{

  
    public function editcontentview()
  {
    return view('admin.content');
  }
 

}
