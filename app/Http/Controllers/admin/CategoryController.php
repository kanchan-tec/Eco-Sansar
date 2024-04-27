<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Category;

class CategoryController extends Controller
{
   public function list(){
        $result = Category::orderBy('id','DESC')->get();
        return view('admin/faq/list',compact('result'));
   }
   public function add(){

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
