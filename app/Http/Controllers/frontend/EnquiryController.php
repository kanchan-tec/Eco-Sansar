<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Frontend\SABEnquiry;
use App\Models\Frontend\SABPost;
use App\Models\Frontend\SABReview;
use App\Models\Frontend\ConsumerEnquiry;
use App\Models\Frontend\ConsumerPost;
use App\Models\Frontend\ConsumerReview;
use RealRashid\SweetAlert\Facades\Alert;
use Mail;

class EnquiryController extends Controller
{

    public function consumer_save(Request $req){
        $req->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'message' => 'required'
        ]);
        $details = ConsumerPost::where('id',$req->id)->first();

        $enquiry = new ConsumerEnquiry();
        $enquiry->user_id = $details->user_id;
        $enquiry->post_id = $req->id;
        $enquiry->name = $req->name;
        $enquiry->email = $req->email;
        $enquiry->mobile = $req->mobile;
        $enquiry->message = $req->message;
        $enquiry->save();

        $post = ConsumerPost::where('id',$req->id)->first();
        // echo "<pre>";
        // print_r($post);die;
        $data = [
            'name' => $req->name,
            'email' => $req->email,
            'mobile' => $req->mobile,
            'msg' => $req->message,
        ];
            // print_r($data);die;
        $data["email"] = $post->email;
        // $data["title"] = "IIV India Registered Valuers Foundation | Payment Success | Thank you";
        $data["title"] =  "Enquiry from ".$req->name;
        // Mail::to(Auth::user()->email)->send(new Payment_done_mail($data));

        Mail::send('frontend.mail.consumermail', $data, function($message)use($data){
            $message->to($data["email"], $data["email"])
                    ->subject($data["title"]);
        });
        // $data["email"] = "userfortesting456@gmail.com";
        // // $data["title"] = "IIV India Registered Valuers Foundation | Payment Success | Thank you";
        // $data["title"] =  "Enquiry from ".$req->name. " for ".$post->name;
        // // Mail::to(Auth::user()->email)->send(new Payment_done_mail($data));

        // Mail::send('frontend.mail.adminconsumermail', $data, function($message)use($data){
        //     $message->to($data["email"], $data["email"])
        //             ->subject($data["title"]);
        // });
        Alert::success('success','Enquiry Added Successfully');
        return redirect()->back();
    }
    public function sab_save(Request $req){
        $req->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'message' => 'required'
        ]);

$details = SABPost::where('id',$req->id)->first();

        $enquiry = new SABEnquiry();
        $enquiry->user_id = $details->user_id;
        $enquiry->post_id = $req->id;
        $enquiry->login_id = $req->loginid;
        $enquiry->name = $req->name;
        $enquiry->email = $req->email;
        $enquiry->mobile = $req->mobile;
        $enquiry->message = $req->message;
        $enquiry->type = 'firsttime';
        $enquiry->save();

        $post = SABPost::where('id',$req->id)->first();
        // echo "<pre>";
        // print_r($post);die;
        $data = [
            'name' => $req->name,
            'email' => $req->email,
            'mobile' => $req->mobile,
            'msg' => $req->message,
        ];
            // print_r($data);die;
        $data["email"] = $post->email;
        // $data["title"] = "IIV India Registered Valuers Foundation | Payment Success | Thank you";
        $data["title"] =  "Enquiry from ".$req->name;
        // Mail::to(Auth::user()->email)->send(new Payment_done_mail($data));

        Mail::send('frontend.mail.consumermail', $data, function($message)use($data){
            $message->to($data["email"], $data["email"])
                    ->subject($data["title"]);
        });
        // $data["email"] = "userfortesting456@gmail.com";
        // // $data["title"] = "IIV India Registered Valuers Foundation | Payment Success | Thank you";
        // $data["title"] =  "Enquiry from ".$req->name. " for ".$post->name;
        // // Mail::to(Auth::user()->email)->send(new Payment_done_mail($data));

        // Mail::send('frontend.mail.adminconsumermail', $data, function($message)use($data){
        //     $message->to($data["email"], $data["email"])
        //             ->subject($data["title"]);
        // });
        Alert::success('success','Enquiry Added Successfully');
        return redirect()->back();
    }
    public function business_save(Request $req){
        $req->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'message' => 'required'
        ]);
        $details = BusinessPost::where('id',$req->id)->first();
        $enquiry = new BusinessEnquiry();
        $enquiry->user_id = $details->user_id;
        $enquiry->post_id = $req->id;
        $enquiry->name = $req->name;
        $enquiry->email = $req->email;
        $enquiry->mobile = $req->mobile;
        $enquiry->message = $req->message;
        $enquiry->save();

        $post = BusinessPost::where('id',$req->id)->first();
        // echo "<pre>";
        // print_r($post);die;
        $data = [
            'name' => $req->name,
            'email' => $req->email,
            'mobile' => $req->mobile,
            'msg' => $req->message,
        ];
            // print_r($data);die;
        $data["email"] = $post->email;
        // $data["title"] = "IIV India Registered Valuers Foundation | Payment Success | Thank you";
        $data["title"] =  "Enquiry from ".$req->name;
        // Mail::to(Auth::user()->email)->send(new Payment_done_mail($data));

        Mail::send('frontend.mail.consumermail', $data, function($message)use($data){
            $message->to($data["email"], $data["email"])
                    ->subject($data["title"]);
        });
        // $data["email"] = "userfortesting456@gmail.com";
        // // $data["title"] = "IIV India Registered Valuers Foundation | Payment Success | Thank you";
        // $data["title"] =  "Enquiry from ".$req->name. " for ".$post->name;
        // // Mail::to(Auth::user()->email)->send(new Payment_done_mail($data));

        // Mail::send('frontend.mail.adminconsumermail', $data, function($message)use($data){
        //     $message->to($data["email"], $data["email"])
        //             ->subject($data["title"]);
        // });
        Alert::success('success','Enquiry Added Successfully');
        return redirect()->back();
    }
    public function sabreviewsave(Request $req){
        $req->validate([
            'title' => 'required',
            'message' => 'required',
            'rating' => 'required',
        ]);
        $details = SABPost::where('id',$req->post_id)->first();
        $enquiry = new SABReview();

        $enquiry->user_id = $details->user_id;
        $enquiry->post_id = $req->post_id;
        $enquiry->title = $req->title;
        $enquiry->message = $req->message;
        $enquiry->rating = $req->rating;

        $enquiry->save();
        Alert::success('success','Review Added Successfully');
        return redirect()->back();
    }
    public function consumerreviewsave(Request $req){
        $req->validate([
            'title' => 'required',
            'message' => 'required',
            'rating' => 'required',
        ]);
        $details = ConsumerPost::where('id',$req->post_id)->first();
        $enquiry = new ConsumerReview();

        $enquiry->user_id = $details->user_id;
        $enquiry->post_id = $req->post_id;
        $enquiry->title = $req->title;
        $enquiry->message = $req->message;
        $enquiry->rating = $req->rating;

        $enquiry->save();
        Alert::success('success','Review Added Successfully');
        return redirect()->back();
    }
    public function businessreviewsave(Request $req){
        $req->validate([
            'title' => 'required',
            'message' => 'required',
            'rating' => 'required',
        ]);
        $details = BusinessPost::where('id',$req->post_id)->first();
        $enquiry = new BusinessReview();

        $enquiry->user_id = $details->user_id;
        $enquiry->post_id = $req->post_id;
        $enquiry->title = $req->title;
        $enquiry->message = $req->message;
        $enquiry->rating = $req->rating;

        $enquiry->save();
        Alert::success('success','Review Added Successfully');
        return redirect()->back();
    }

}
