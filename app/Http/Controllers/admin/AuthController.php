<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Auth;

class AuthController extends Controller
{
    public function  admin_login(){
        return view('admin.auth.login');
    }
    public function admin_store(Request $request){
          // echo "test";die;
          $input = $request->all();
          //print_r($input);die;
                  $this->validate($request, [
                     // 'email' => 'required|email',
                      'email' => 'required|exists:users,email',
                      'password' => 'required|min:8',
                  ]);
                  if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
                  {
                          return redirect()->route('admin_dashboard');
                  }else{
                      return redirect()->route('login')->withErrors([
                          'password' => 'You have entered an incorrect password,',
                      ]);
                  }
              }
              public function admin_dashboard (){
                return view('index');
              }
              public function signOut() {
                Session::flush();
                Auth::logout();
                return Redirect('admin_login');
            }
    }


