<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\frontend\EcosansarUsers;
use App\Models\frontend\BusinessPost;
use App\Models\frontend\SABPost;
use App\Models\frontend\ConsumerPost;

class AdminController extends Controller
{
  public function businesslist(){
    $result = EcosansarUsers::where('user_type','business')->get();
    return view('admin/usertype/businesslist',compact('result'));
  }
  public function sablist(){
    $result = EcosansarUsers::where('user_type','sab')->get();
    return view('admin/usertype/sablist',compact('result'));
  }
  public function consumerlist(){
    $result = EcosansarUsers::where('user_type','consumer')->get();
    return view('admin/usertype/consumerlist',compact('result'));
  }
  public function businessview($id){
    $users = EcosansarUsers::where('id', $id)->first();
    $data=compact('users');
    return view('admin/usertype/businessview')->with($data);
  }
  public function sabview($id){
    $users = EcosansarUsers::where('id', $id)->first();
    $data=compact('users');
    return view('admin/usertype/sabview')->with($data);
  }
  public function consumerview($id){
    $users = EcosansarUsers::where('id', $id)->first();
    $data=compact('users');
    return view('admin/usertype/consumerview')->with($data);
  }
  public function businessposts(){
    $result = BusinessPost::get();
    return view('admin/usertype/businesspostslist',compact('result'));
  }
  public function sabposts(){
    $result = SABPost::get();
    return view('admin/usertype/sabpostslist',compact('result'));
  }
  public function consumerposts(){
    $result = ConsumerPost::get();
    return view('admin/usertype/consumerpostslist',compact('result'));
  }
  public function businesspostsview($id){
    $users = BusinessPost::where('id', $id)->first();
    $data=compact('users');
    return view('admin/usertype/businesspostsview')->with($data);
  }
  public function sabpostsview($id){
    $users = SABPost::where('id', $id)->first();
    $data=compact('users');
    return view('admin/usertype/sabpostsview')->with($data);
  }
  public function consumerpostsview($id){
    $users = ConsumerPost::where('id', $id)->first();
    $data=compact('users');
    return view('admin/usertype/consumerpostsview')->with($data);
  }
}
