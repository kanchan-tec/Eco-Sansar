<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Auth;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;

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
                      return redirect()->route('admin_login')->withErrors([
                          'password' => 'You have entered an incorrect password,',
                      ]);
                  }
              }
              public function admin_dashboard (){
                return view('index');
        }
        public function admin_profile($id)
        {
            $url=route('admin_profile_update',$id);

            $user=User::where('id',$id)->where('type','admin')->first();
            // echo "<pre>";
            // print_r($user->first_name);die;
            $data=compact('url','user');

            return view('admin/profile')->with($data);
        }
        public function admin_profile_update(Request $request,$id)
        {

            $request->validate([
                'first_name' => 'required',
                'email' => 'required',
                'password' => $request->filled('password') ? 'min:8' : '', // Conditional validation
                'profile_pic' =>'required'
            ]);

            $user = User::find($id);
            $user->first_name=$request->first_name;
            $user->last_name=$request->last_name;
            $user->email=$request->email;
            if ($request->filled('password')) {
                $user->password = Hash::make($request->password);
            } else {
                $user->password = $user->password;
            }
            if($request->hasFile('profile_pic')){
                $aadhar_image = $request->file('profile_pic');
                $aadhar_fileexe = $aadhar_image->getClientOriginalExtension();
                $aadhar_filenm = 'admin_profile_pic'.".".$aadhar_fileexe;
                $request->file('profile_pic')->move('assets/images/Adminprofile', $aadhar_filenm);
                $user->profile_pic = $aadhar_filenm;
            }
            $user->save();
            Alert::success('Success','Admin Information Updated Successfully');
             return redirect()->route('admin_dashboard');
        }
        public function changepassword(){
            return view('admin/changepassword');
        }
        public function changePassword_store(Request $request)
{
    $request->validate([
        'current_password' => 'required',
        'new_password' => 'required|string|min:8|confirmed',
    ]);

    $user = Auth::user();

    if (!Hash::check($request->current_password, $user->password)) {
        return redirect()->back()->with('error', 'The current password is incorrect.');
    }

    $user->password = Hash::make($request->new_password);
    $user->save();

    return redirect()->back()->with('success', 'Password changed successfully.');
}
     public function signOut() {
        Session::flush();
        Auth::logout();
         return Redirect('admin_login');
    }
    }


