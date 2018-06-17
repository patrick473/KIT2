<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class AdminLoginController extends Controller
{
    public function __construct(){
        $this->middleware('guest:admin',['except' =>['logout']]);
    }
    public function showLoginForm(){

        return view('auth.admin-login');
    }
    public function login(Request $request){
        //validate data
        $this->validate($request,[
            'username' => 'required|',
            'password' => 'required'

        ]);
        //attempt login
        if( Auth::guard('admin')->attempt(['username'=> $request->username, 'password'=>$request->password],$request->remember)){
            //if succesful, redirect to intended location
            return redirect()->intended(route('admin.home'));
        }
        //if unsuccesful, redirect back
        return redirect()->back()->withInput($request->only('username','remember'));
        
    }
    public function logout()
    {
        Auth::guard('admin')->logout();

      

        return redirect('/');
    }
}
