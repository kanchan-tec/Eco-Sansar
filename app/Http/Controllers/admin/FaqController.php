<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index(){
        $result = Faq::orderBy('id','DESC')->get();
        return view('admin/faq/list',compact('result'));
    }

    public function add(){
        return view('admin/faq/add');
    }

    public function save(Request $req){
        // echo "<pre>";
        // print_r($req->all());die;
     

        $faq = new Faq();
        $faq->category = $req->category;
        $faq->question = $req->question;
        $faq->answer = $req->answer;
        $faq->save();
    }
}
