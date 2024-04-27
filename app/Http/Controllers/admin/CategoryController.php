<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Category;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
   public function list(){
        $result = Category::orderBy('id','DESC')->get();
        return view('admin/category/list',compact('result'));
   }
   public function add(){
        $url = route('category.save');
        return view('admin/category/add',compact('url'));
   }
   public function save(Request $req){
    $category = new Category();
    $category->category_name = $req->category_name;
    $category->save();
    Alert::success('success','Category Added Successfully');
    return redirect()->route('category.list');
   }
   public function edit($id){
    $url = route('category.update', $id);
    $category = Category::where('id',$id)->first();
    return view('admin/category/add',compact('url','category'));
   }
   public function update(Request $req, $id){
    $category = Category::find($id);
    $category->category_name = $req->category_name;
    $category->save();
    Alert::success('success','Category Updated Successfully');
    return redirect()->route('category.list');
   }
   public function delete($id){
    Category::where('id',$id)->delete();
    Alert::success('success','Category Deleted Successfully');
    return redirect()->route('category.list');
   }
}
