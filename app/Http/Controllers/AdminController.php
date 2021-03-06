<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Survey as Survey;
class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
         $surveys = Survey::get();
         return view('admin.home');
        
    }
    
}
