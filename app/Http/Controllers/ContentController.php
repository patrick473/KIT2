<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function editcontentview() 
  {
    return view('admin.content');
  }
}
