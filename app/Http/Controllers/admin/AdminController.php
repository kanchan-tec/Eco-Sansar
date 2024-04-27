<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\frontend\EcosansarUsers;

class AdminController extends Controller
{
  public function list(){
    $result = EcosansarUsers::get();
    return view('admin/usertype/list');
  }
}
