<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function list()
   {
     $contacts = Contactus::orderBy('id', 'DESC')->get();
     $data = compact('contacts');
     return view('admin.contact.list',compact('contacts'));
   }

   public function add()
   {
    return view('contact/add');
   }

   public function save(Request $req)
   {
        $req->validate([
            'email' => 'required|email',
            'mobile' => 'required|numeric|Max:10',
            'address' => 'required',
            'map' => 'required'
        ]);

        $contact = new Contactus;
        $contact->email = $req->email;
        $contact->mobile = $req->mobile;
        $contact->address = $req->address;
        $contact->map = $req->map;
        $contact->save();

        return view('admin.contact.list');

   }
}
