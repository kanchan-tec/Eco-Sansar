<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\frontend\EcosansarUsers;
use RealRashid\SweetAlert\Facades\Alert;

class IndexController extends Controller
{
    public function index(Request $request)
    {
       return view('frontend/index');
    }

    public function user_register()
    {
        return view('frontend/auth/register');
    }
    public function user_type(){
        return view('frontend/auth/usertype');
    }
    public function business_add(){
        return view('frontend/auth/businessadd');
    }
    public function sab_add(){
        return view('frontend/auth/sabadd');
    }
    public function consumer_add(){
        return view('frontend/auth/consumeradd');
    }
    public function business_save(Request $req)
    {
        $req->validate([
            'name' => 'required',
            'password' => 'required',
            'pincode' => 'required',
            'email' => 'required|email',
            'mobile' => 'required|numeric',
            'address' => 'required',
            'gst' => 'required'
        ]);

        $user = new EcosansarUsers;
        $user->name = $req->name;
        $user->address = $req->address;
        $user->pincode = $req->pincode;
        $user->contact_person = $req->contact_person;
        $user->mobile = $req->mobile;
        $user->email = $req->email;
        $user->password = $req->password;
        $user->gst = $req->gst;
        $user->user_type = $req->user_type;
        $user->save();

        Alert::success('success','Registration Successfull');
        return redirect()->back();

    }

    public function sab_save(Request $req)
    {
        $req->validate([
            'name' => 'required',
            'pincode' => 'required',
            'mobile' => 'required',
            'address' => 'required',
        ]);

        $user = new EcosansarUsers;
        $user->name = $req->name;
        $user->address = $req->address;
        $user->pincode = $req->pincode;
        $user->mobile = $req->mobile;
        $user->latitude = $req->latitude;
        $user->longitude = $req->longitude;
        $user->user_type = $req->user_type;
        $user->save();

        Alert::success('success','Registration Successfull');
        return redirect()->back();
    }
    public function consumer_save(Request $req){
        $req->validate([
            'name' => 'required',
            'mobile' => 'required',
            'address' => 'required',
        ]);
        $user = new EcosansarUsers;
        $user->name = $req->name;
        $user->mobile = $req->mobile;
        $user->address = $req->address;
        $user->pincode = $req->pincode;
        $user->type_of_residences = $req->type_of_residences;
        $user->email = $req->email;
        $user->user_type = $req->user_type;
        $user->save();

        Alert::success('success','Registration Successfull');
        return redirect()->back();
    }
}
