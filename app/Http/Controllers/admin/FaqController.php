<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\faq;

class FaqController extends Controller
{
    public function list(){
        $result = Faq::orderBy('id','DESC')->get();
        return view('admin/faq/list',compact('result'));
    }
    public function add(){
        $url = route('faq.save');
        return view('admin/faq/add',compact('url'));
    }
    public function save(Request $req){
        $faq = new Faq();
        $faq->category = $req->category;
        $faq->question = $req->question;
        $faq->answer = $req->answer;
        $faq->save();
    }
    public function edit($id){
        $url = route('faq.update', $id);
        $faq = Faq::where('id',$id)->first();
        return view('admin/faq/add',compact('url','faq'));

    }
    public function update(Request $req, $id){
        $faq = Faq::find($id);
        $faq->category = $req->category;
        $faq->question = $req->question;
        $faq->answer = $req->answer;
        $faq->save();
    }
    public function delete($id){
        Faq::where('id',$id)->delete();
    }
}
