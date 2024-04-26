<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function list(){

    }
    public function add(){
        return view('admin/about/add');
    }
    public function save(Request $req){

    }
    public function edit($id){

    }
    public function update(Request $req, $id){

    }
    public function delete($id){

    }
}
