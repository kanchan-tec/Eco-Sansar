<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\About;
use Illuminate\Support\Str;

class AboutController extends Controller
{
    public function list(){
        $result = About::orderBy('id','DESC')->get();
        return view('admin/about/list',compact('result'));
    }
    public function add(){
        $url = route('about.save');
        return view('admin/about/add',compact('url'));
    }
    public function save(Request $req){
        $htmlContent = $req->content;
        $modifiedContent = Str::replaceFirst('../assets/', '/assets/', $htmlContent);
        $about = new About();
        $about->content = $modifiedContent;
        $about->save();
    }
    public function edit($id){
        $url = route('about.update',$id);
        $about = About::where('id',$id)->first();
        return view('admin/about/add',compact('url','about'));
    }
    public function update(Request $req, $id){
        $about = About::find($id);
        $about->content = $req->content;
        $about->save();
    }
    public function delete($id){
        About::where('id',$id)->delete();
    }
}
