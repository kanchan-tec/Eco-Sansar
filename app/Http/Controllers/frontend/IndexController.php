<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\frontend\EcosansarUsers;
use App\Models\frontend\ConsumerPost;
use App\Models\frontend\ConsumerResourcePost;
use App\Models\Frontend\ConsumerReview;
use App\Models\frontend\SABPost;
use App\Models\frontend\SABReview;
use App\Models\frontend\SABEnquiry;
use App\Models\frontend\SABEnquiryMessages;
use App\Models\frontend\SABResourcePost;
use App\Models\frontend\BusinessPost;
use App\Models\frontend\BusinessResourcePost;
use App\Models\admin\Resource;
use App\Models\admin\Weight;
use RealRashid\SweetAlert\Facades\Alert;
use Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Auth;
use DB;
use Mail;

class IndexController extends Controller
{
    public function index(Request $request)
    {
       return view('frontend/index');
    }
    public function user_register()
    {
        return view('frontend/auth/register');
    }
    public function user_type(){
        return view('frontend/auth/usertype');
    }
    public function business_add(){
        return view('frontend/auth/businessadd');
    }
    public function sab_add(){
        return view('frontend/auth/sabadd');
    }
    public function consumer_add(){
        return view('frontend/auth/consumeradd');
    }
    public function business_save(Request $req)
    {
        $req->validate([
            'name' => 'required',
            'password' =>  'required|min:8',
            'pincode' => 'required|min:6|max:6',
            'mobile' => 'required|unique:ecosansar_users,mobile',
            'email' => 'required|email',
            'address' => 'required',
            'gst' => 'required|min:15|regex:/^([0-9]){2}([A-Za-z]){5}([0-9]){4}([A-Za-z]){1}([0-9]{1})([A-Za-z]){1}([0-9]{1})?$/',
        ]);
      //  echo $a = Hash::make($req->password);die;

        $user = new EcosansarUsers;
        $user->name = $req->name;
        $user->address = $req->address;
        $user->pincode = $req->pincode;
        $user->contact_person = $req->contact_person;
        $user->mobile = $req->mobile;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->gst = $req->gst;
        $user->user_type = $req->user_type;
        $user->save();
        Alert::success('success','Registration Successfull');
        return redirect()->back();
    }

    public function sab_save(Request $req)
    {
        $req->validate([
            'name' => 'required',
            'pincode' => 'required|min:6|max:6',
            'mobile' => 'required|unique:ecosansar_users,mobile',
            'address' => 'required',
            'latitude' => 'required',
            'longitude' =>'required'
        ]);
        $user = new EcosansarUsers;
        $user->name = $req->name;
        $user->address = $req->address;
        $user->pincode = $req->pincode;
        $user->mobile = $req->mobile;
        $user->latitude = $req->latitude;
        $user->longitude = $req->longitude;
        $user->user_type = $req->user_type;
        $user->save();
        Alert::success('success','Registration Successfull');
        return redirect()->back();
    }
    public function consumer_save(Request $req){
        $req->validate([
            'name' => 'required',
            'pincode' => 'required|min:6|max:6',
            'mobile' => 'required|unique:ecosansar_users,mobile',
            'address' => 'required',
            'email' =>'required',
            'type_of_residences' => 'required',
            'latitude' => 'required',
            'longitude' =>'required'
        ]);
        $user = new EcosansarUsers;
        $user->name = $req->name;
        $user->mobile = $req->mobile;
        $user->address = $req->address;
        $user->pincode = $req->pincode;
        $user->type_of_residences = $req->type_of_residences;
        $user->email = $req->email;
        $user->user_type = $req->user_type;
        $user->latitude = $req->latitude;
        $user->longitude = $req->longitude;
        $user->save();

        Alert::success('success','Registration Successfull');
        return redirect()->back();
    }

    public function business_login()
    {
        return view('frontend/auth/businesslogin');
    }
    public function business_store(Request $request){
        // Get the input data from the request
        $input = $request->all();

        // Perform validation on the input data
        $validator = Validator::make($input, [
            'email' => 'required|exists:ecosansar_users,email',
            'password' => 'required|min:8',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->route('business_login')->withErrors($validator)->withInput();
        }

        // Retrieve the user by the provided email address
        $user = EcosansarUsers::where('email', $input['email'])->where('user_type','business')->first();

        // Check if user exists and is checked
        if ($user && $user->is_checked && Hash::check($input['password'], $user->password)) {
            // Authentication successful, redirect to business details page
            session()->put('user_id', $user->id);
            session()->put('user_type', $user->user_type);



            // Check if there is a redirect_to value in the session
            $redirect_to = session()->get('redirect_to');
            if ($redirect_to) {
                // If so, redirect the user to that page
                session()->forget('redirect_to'); // Clear the session value
                return redirect($redirect_to);
            }

            // If there's no redirect_to value, redirect to the business_posts page
            return redirect()->route('business_posts');
        } else {
            // Authentication failed, redirect back to login with error message
            if ($user && !$user->is_checked) {
                return redirect()->route('business_login')->withErrors([
                    'email' => 'You need approval from administrator.',
                ])->withInput();
            } else {
                return redirect()->route('business_login')->withErrors([
                    'password' => 'You have entered an incorrect password.',
                ])->withInput();
            }
        }
    }

    public function business_post_save(Request $request){
        // echo "<pre>";
        // print_r($req->all());die;
         $user_id = session()->get('user_id');
         $user_type = session()->get('user_type');
        $request->validate([
            'address' =>'required',
            'pincode' =>'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'sale_giveaway' =>'required',
            'quantity' => 'required',
            'clean_unclean' =>'required',
            'packaged' => 'required',
            'resource_img' =>'required',
            'post_pic' =>'required',
            'resource_type' =>'required'
        ]);
        $selectedResources = $request->input('resource_type');

        // If any resources are selected
        if (!empty($selectedResources)) {
            // Convert the array of selected resource IDs to a comma-separated string
            $resourceIds = implode(',', $selectedResources);
        } else {
            $resourceIds = null; // or any default value if no resources are selected
        }
        $user = new BusinessPost();
        $user->user_id=$user_id;
        $user->address=$request->address;
        $user->pincode=$request->pincode;
      //  $user->resource_type=$resourceIds;
        $user->latitude=$request->latitude;
        $user->longitude=$request->longitude;
        $user->sale_giveaway=$request->sale_giveaway;
        $user->quantity=$request->quantity;
        $user->clean_unclean=$request->clean_unclean;
        $user->packaged=$request->packaged;
        $user->description=$request->description;

        if($request->hasFile('post_pic')){
            $aadhar_image = $request->file('post_pic');
            $aadhar_fileexe = $aadhar_image->getClientOriginalExtension();
            $aadhar_filenm = 'businesspost'.".".$aadhar_fileexe;
            $request->file('post_pic')->move('frontend/assets/img/Businesspostimages', $aadhar_filenm);
            $user->post_pic = $aadhar_filenm;
        }
        $user->save();
         // Loop through each resource type and its associated image
    foreach($request->resource_type as $index => $resourceId) {
        // Save resource name
        $resource = new BusinessResourcePost();
        $resource->user_id = $user_id;
        $resource->post_id = $user->id;
        $resource->resource_type = $resourceId;

        $image = $request->file('resource_img')[$index];
        $imageName = $user_id.'_'.$user->id.'_'.$resourceId.'.'.$image->extension();
        $image->move('frontend/assets/img/Businessposts', $imageName); // Move image to storage, adjust path as needed
        $resource->resource_img = $imageName;
        $resource->save();
    }
        Alert::success('Success','Business Post Added Successfully');
         return redirect()->route('business_posts');
    }
    public function business_posts(){
        $user_id = session()->get('user_id');
        $user_type = session()->get('user_type');
       $listings = BusinessPost::join('business_resource_posts', 'business_resource_posts.post_id', 'business_posts.id')
   ->join('resources', 'resources.id', 'business_resource_posts.resource_type')
   ->select('business_posts.*', 'resources.resource_name')
   ->where('business_posts.user_id', $user_id)
   ->get();

// Extract unique post IDs
$postIds = $listings->pluck('id')->unique();

// Filter listings to get only one record per post and include all resource names
$uniqueListings = collect([]);
foreach ($postIds as $postId) {
   $postListings = $listings->where('id', $postId);
   $resourceNames = $postListings->pluck('resource_name')->implode(', ');
   $uniqueListing = $postListings->first();
   $uniqueListing->resource_names = $resourceNames;
   $uniqueListings->push($uniqueListing);
}

       return view('frontend/userdetails/businessposts',compact('uniqueListings'));
   }
    public function business_details(){
        $user_id = session()->get('user_id');
        $user_type = session()->get('user_type');
        $resources = Resource::get();
        $weights =Weight::get();
        return view('frontend/userdetails/businessdetails',compact('user_id','resources','weights'));
    }

    public function sab_login()
    {
        return view('frontend/auth/sablogin');
    }
    public function signOut() {
        // Clear all session data
        Session::flush();

        // Redirect to the login page
        return redirect('/');
    }

    public function sab_store(Request $request){
        // Get the input data from the request
        $input = $request->all();

        // Perform validation on the input data
        $validator = Validator::make($input, [
            'mobile' => 'required|exists:ecosansar_users,mobile',
            'otp' => 'required',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->route('sab_login')->withErrors($validator)->withInput();
        }

        // Retrieve the user by the provided email address
        $user = EcosansarUsers::where('mobile', $input['mobile'])->where('user_type','sab')->first();

        // Verify the otp
        if ($user && $user->is_checked && ($input['otp'] == $user->otp)) {
            // Authentication successful, redirect to business details page
            session()->put('user_id', $user->id);
            session()->put('user_type', $user->user_type);
            // Check if there is a redirect_to value in the session
     $redirect_to = session()->get('redirect_to');
     //$redirect_to = session('redirect_to');
     if ($redirect_to) {
         // If so, print the value (for debugging purposes)
       //  echo "Redirect To: " . $redirect_to;
         // Redirect the user to that page
         session()->forget('redirect_to'); // Clear the session value
         return redirect($redirect_to);
     }

     // If there's no redirect_to value, redirect to the consumer_posts page
            return redirect()->route('sab_posts');
        } else {
            // Authentication failed, redirect back to login with error message
            if ($user && !$user->is_checked) {
                return redirect()->route('sab_login')->withErrors([
                    'mobile' => 'You need approval from administrator.',
                ])->withInput();
            } else {
                return redirect()->route('sab_login')->withErrors([
                    'otp' => 'You have entered an incorrect otp.',
                ])->withInput();
            }
        }
    }
    public function sab_posts(){
        $user_id = session()->get('user_id');
        $user_type = session()->get('user_type');
       $listings = SABPost::join('s_a_b_resource_posts', 's_a_b_resource_posts.post_id', 's_a_b_posts.id')
   ->join('resources', 'resources.id', 's_a_b_resource_posts.resource_type')
   ->select('s_a_b_posts.*', 'resources.resource_name')
   ->where('s_a_b_posts.user_id', $user_id)
   ->get();

// Extract unique post IDs
$postIds = $listings->pluck('id')->unique();

// Filter listings to get only one record per post and include all resource names
$uniqueListings = collect([]);
foreach ($postIds as $postId) {
   $postListings = $listings->where('id', $postId);
   $resourceNames = $postListings->pluck('resource_name')->implode(', ');
   $uniqueListing = $postListings->first();
   $uniqueListing->resource_names = $resourceNames;
   $uniqueListings->push($uniqueListing);
}

       return view('frontend/userdetails/sabposts',compact('uniqueListings'));
   }
    public function sab_details(){
        $user_id = session()->get('user_id');
        $user_type = session()->get('user_type');
        $resources = Resource::get();
        $weights =Weight::get();
        return view('frontend/userdetails/sabdetails',compact('user_id','resources','weights'));
    }
    public function sab_post_save(Request $request){
        // echo "<pre>";
        // print_r($req->all());die;
         $user_id = session()->get('user_id');
         $user_type = session()->get('user_type');
        $request->validate([
            'name' =>'required',
            'mobile' => 'required',
            'email' => 'required',
            'address' =>'required',
            'pincode' =>'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'sale_giveaway' =>'required',
            'quantity' => 'required',
            'clean_unclean' =>'required',
            'packaged' => 'required',
            'resource_img' =>'required',
            'post_pic' =>'required',
            'resource_type' =>'required'
        ]);
        $selectedResources = $request->input('resource_type');

        // If any resources are selected
        if (!empty($selectedResources)) {
            // Convert the array of selected resource IDs to a comma-separated string
            $resourceIds = implode(',', $selectedResources);
        } else {
            $resourceIds = null; // or any default value if no resources are selected
        }
        $user = new SABPost();
        $user->user_id=$user_id;
        $user->name=$request->name;
        $user->email=$request->email;
        $user->mobile=$request->mobile;
        $user->address=$request->address;
        $user->pincode=$request->pincode;
      //  $user->resource_type=$resourceIds;
        $user->latitude=$request->latitude;
        $user->longitude=$request->longitude;
        $user->sale_giveaway=$request->sale_giveaway;
        $user->quantity=$request->quantity;
        $user->clean_unclean=$request->clean_unclean;
        $user->packaged=$request->packaged;

        if($request->hasFile('post_pic')){
            $aadhar_image = $request->file('post_pic');
            $aadhar_fileexe = $aadhar_image->getClientOriginalExtension();
            $aadhar_filenm = $request->name.".".$aadhar_fileexe;
            $request->file('post_pic')->move('frontend/assets/img/SABpostimages', $aadhar_filenm);
            $user->post_pic = $aadhar_filenm;
        }
        $user->save();
         // Loop through each resource type and its associated image
    foreach($request->resource_type as $index => $resourceId) {
        // Save resource name
        $resource = new SABResourcePost();
        $resource->user_id = $user_id;
        $resource->post_id = $user->id;
        $resource->resource_type = $resourceId;

        $image = $request->file('resource_img')[$index];
        $imageName = $user_id.'_'.$user->id.'_'.$resourceId.'.'.$image->extension();
        $image->move('frontend/assets/img/SABposts', $imageName); // Move image to storage, adjust path as needed
        $resource->resource_img = $imageName;
        $resource->save();
    }
        Alert::success('Success','SAB Post Added Successfully');
         return redirect()->route('sab_posts');
    }
    public function consumer_login()
    {
        return view('frontend/auth/consumerlogin');
    }
    public function consumer_store(Request $request){
        // Get the input data from the request
        $input = $request->all();

        // Perform validation on the input data
        $validator = Validator::make($input, [
            'mobile' => 'required|exists:ecosansar_users,mobile',
            'otp' => 'required',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->route('consumer_login')->withErrors($validator)->withInput();
        }

        // Retrieve the user by the provided email address
        $user = EcosansarUsers::where('mobile', $input['mobile'])->where('user_type','consumer')->first();

        // Verify the otp
        if ($user && $user->is_checked && ($input['otp'] == $user->otp)) {
            // Authentication successful, redirect to business details page
         // Store user_id in the session
        session()->put('user_id', $user->id);
        session()->put('user_type', $user->user_type);
    // Check if there is a redirect_to value in the session
     $redirect_to = session()->get('redirect_to');
    //$redirect_to = session('redirect_to');
    if ($redirect_to) {
        // If so, print the value (for debugging purposes)
      //  echo "Redirect To: " . $redirect_to;
        // Redirect the user to that page
        session()->forget('redirect_to'); // Clear the session value
        return redirect($redirect_to);
    }

    // If there's no redirect_to value, redirect to the consumer_posts page
    return redirect()->route('consumer_posts');

        } else {
            // Authentication failed, redirect back to login with error message
            if ($user && !$user->is_checked) {
                return redirect()->route('consumer_login')->withErrors([
                    'mobile' => 'You need approval from administrator.',
                ])->withInput();
            } else {
                return redirect()->route('consumer_login')->withErrors([
                    'otp' => 'You have entered an incorrect otp.',
                ])->withInput();
            }
        }
    }
    public function consumer_posts(){
         $user_id = session()->get('user_id');
         $user_type = session()->get('user_type');
        // $listings = ConsumerPost::
        // where('user_id',$user_id)->get();
        // $listings = ConsumerPost::join('consumer_resource_posts','consumer_resource_posts.post_id','consumer_posts.id')
        // ->join('resources','resources.id','consumer_resource_posts.resource_type')
        // ->select('consumer_posts.*','resources.resource_name')
        // ->where('consumer_posts.user_id',$user_id)->get()->unique();
        $listings = ConsumerPost::join('consumer_resource_posts', 'consumer_resource_posts.post_id', 'consumer_posts.id')
    ->join('resources', 'resources.id', 'consumer_resource_posts.resource_type')
    ->select('consumer_posts.*', 'resources.resource_name')
    ->where('consumer_posts.user_id', $user_id)
    ->get();

// Extract unique post IDs
$postIds = $listings->pluck('id')->unique();

// Filter listings to get only one record per post and include all resource names
$uniqueListings = collect([]);
foreach ($postIds as $postId) {
    $postListings = $listings->where('id', $postId);
    $resourceNames = $postListings->pluck('resource_name')->implode(', ');
    $uniqueListing = $postListings->first();
    $uniqueListing->resource_names = $resourceNames;
    $uniqueListings->push($uniqueListing);
}

        return view('frontend/userdetails/consumerposts',compact('uniqueListings'));
    }
    public function consumer_details(){
         $user_id = session()->get('user_id');
         $user_type = session()->get('user_type');
       $users = EcosansarUsers::where('id',$user_id)->first();
       $resources = Resource::get();
       $weights =Weight::get();
        return view('frontend/userdetails/consumerdetails',compact('users','user_id','resources','weights'));
    }
    public function consumer_post_save(Request $request){
        // echo "<pre>";
        // print_r($req->all());die;
         $user_id = session()->get('user_id');
         $user_type = session()->get('user_type');
        $request->validate([
            'name' =>'required',
            'mobile' => 'required',
            'email' => 'required',
            'address' =>'required',
            'pincode' =>'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'sale_giveaway' =>'required',
            'quantity' => 'required',
            'clean_unclean' =>'required',
            'packaged' => 'required',
            'resource_img' =>'required',
            'post_pic' =>'required',
            'resource_type' =>'required'
        ]);
        $selectedResources = $request->input('resource_type');

        // If any resources are selected
        if (!empty($selectedResources)) {
            // Convert the array of selected resource IDs to a comma-separated string
            $resourceIds = implode(',', $selectedResources);
        } else {
            $resourceIds = null; // or any default value if no resources are selected
        }
        $user = new ConsumerPost();
        $user->user_id=$user_id;
        $user->name=$request->name;
        $user->email=$request->email;
        $user->mobile=$request->mobile;
        $user->address=$request->address;
        $user->pincode=$request->pincode;
      //  $user->resource_type=$resourceIds;
        $user->latitude=$request->latitude;
        $user->longitude=$request->longitude;
        $user->sale_giveaway=$request->sale_giveaway;
        $user->quantity=$request->quantity;
        $user->clean_unclean=$request->clean_unclean;
        $user->packaged=$request->packaged;

        if($request->hasFile('post_pic')){
            $aadhar_image = $request->file('post_pic');
            $aadhar_fileexe = $aadhar_image->getClientOriginalExtension();
            $aadhar_filenm = $request->name.".".$aadhar_fileexe;
            $request->file('post_pic')->move('frontend/assets/img/Consumerpostimages', $aadhar_filenm);
            $user->post_pic = $aadhar_filenm;
        }
        $user->save();
         // Loop through each resource type and its associated image
    foreach($request->resource_type as $index => $resourceId) {
        // Save resource name
        $resource = new ConsumerResourcePost();
        $resource->user_id = $user_id;
        $resource->post_id = $user->id;
        $resource->resource_type = $resourceId;

        $image = $request->file('resource_img')[$index];
        $imageName = $user_id.'_'.$user->id.'_'.$resourceId.'.'.$image->extension();
        $image->move('frontend/assets/img/Consumerposts', $imageName); // Move image to storage, adjust path as needed
        $resource->resource_img = $imageName;
        $resource->save();
    }
        Alert::success('Success','Consumer Post Added Successfully');
         return redirect()->route('consumer_posts');
    }
    public function consumer_listing_details($id){
         $user_id = session()->get('user_id');
         $user_type = session()->get('user_type');
        $consumerpostsres = ConsumerResourcePost::where('user_id',$user_id)->where('post_id',$id)->get();
        $consumerposts = ConsumerPost::join('weights','weights.id','consumer_posts.quantity')
        ->select('consumer_posts.*','weights.*')
        ->where('consumer_posts.user_id',$user_id)
        ->where('consumer_posts.id',$id)->first();
        $conreviews = ConsumerReview::where('post_id',$id)->where('user_id',$user_id)->get();
        // echo "<pre>";
        // print_r($consumerposts);die;
        return view('frontend/userdetails/consumerlistingdetail',compact('consumerpostsres','consumerposts','conreviews'));
    }

    public function sab_listing_details($id){
        $user_id = session()->get('user_id');
        $user_type = session()->get('user_type');
        $sab = SABPost::where('id',$id)->first();;
        $sabuserid = $sab->user_id;
        $sabpostid = $sab->post_id;
       $sabpostsres = SABResourcePost::where('user_id',$user_id)->where('post_id',$id)->get();
       $sabposts = SABPost::join('weights','weights.id','s_a_b_posts.quantity')
       ->select('s_a_b_posts.*','weights.*')
       ->where('s_a_b_posts.user_id',$user_id)
       ->where('s_a_b_posts.id',$id)->first();

       $sabreviews = SABReview::where('post_id',$id)->where('user_id',$user_id)->get();
       $sabenquiries = SabEnquiry::where('post_id',$id)->where('user_id',$sabuserid)->get();
    if($sabenquiries->isEmpty()){
    }else{
       $enquiry_id = $sabenquiries[0]->id;
     }
       $sabenquirymsg = SABEnquiryMessages::where('post_id',$id)->where('user_id',$sabuserid)->get();
    //      echo "<pre>";
    //    print_r($sabenquirymsg);die;
    if($sabenquiries->isEmpty()){
        return view('frontend/userdetails/sablistingdetail',compact('sabpostsres','sabposts','sabreviews','sabenquiries','user_id','sabuserid','id','sabenquirymsg'));
    }else{

       return view('frontend/userdetails/sablistingdetail',compact('sabpostsres','sabposts','sabreviews','sabenquiries','user_id','sabuserid','id','enquiry_id','sabenquirymsg'));
   }}

   public function sabsendEnquiryEmail(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'message' => 'required'
        ]);

          $email = $request->input('email');
           $messageContent = $request->input('message');

    $sabenquiry =  new SABEnquiryMessages;
    $sabenquiry->enquiry_id = $request->enquiry_id;
    $sabenquiry->login_id = $request->login_id;
    $sabenquiry->user_id = $request->user_id;
    $sabenquiry->post_id = $request->post_id;
    $sabenquiry->adminmessage = $request->input('message');
    $sabenquiry->type = 'admin';
    $sabenquiry->save();

    $data = [
        'email' => $email,
        'messageContent' => $messageContent,
        'title' => 'Response to your enquiry'
    ];
    Mail::send('frontend.mail.sabenquirymail', $data, function($message)use($data){
        $message->to($data["email"], $data["email"])
                ->subject($data["title"]);
    });
    Alert::success('success','Mail Send Successfully');
    return redirect()->back();
    }

    public function loginsabsendEnquiryEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'message' => 'required'
        ]);

          $email = $request->input('email');
           $messageContent = $request->input('message');

           $sabenquiry =  new SABEnquiryMessages;
           $sabenquiry->enquiry_id = $request->enquiry_id;
           $sabenquiry->login_id = $request->login_id;
           $sabenquiry->user_id = $request->user_id;
           $sabenquiry->post_id = $request->post_id;
    $sabenquiry->usermessage = $request->input('message');
    $sabenquiry->type = 'loginuser';
    $sabenquiry->save();

    $data = [
        'email' => $email,
        'messageContent' => $messageContent,
        'title' => 'Response to your enquiry'
    ];
    Mail::send('frontend.mail.sabenquirymail', $data, function($message)use($data){
        $message->to($data["email"], $data["email"])
                ->subject($data["title"]);
    });
    Alert::success('success','Mail Send Successfully');
    return redirect()->back();
    }
   public function business_listing_details($id){
    $user_id = session()->get('user_id');
    $user_type = session()->get('user_type');
   $businesspostsres = BusinessResourcePost::where('user_id',$user_id)->where('post_id',$id)->get();
   $businessposts = BusinessPost::join('weights','weights.id','business_posts.quantity')
   ->select('business_posts.*','weights.*')
   ->where('business_posts.user_id',$user_id)
   ->where('business_posts.id',$id)->first();
//    echo "<pre>";
//    print_r($businessposts->sale_giveaway);die;
   return view('frontend/userdetails/businesslistingdetail',compact('businesspostsres','businessposts'));
}

public function listings(){
     $user_id = session()->get('user_id');
      $user_type = session()->get('user_type');

//Business posts
if ($user_type !== 'consumer') {
    $listings = BusinessPost::join('business_resource_posts', 'business_resource_posts.post_id', 'business_posts.id')
->join('resources', 'resources.id', 'business_resource_posts.resource_type')
->select('business_posts.*', 'resources.resource_name');
// Exclude user's own posts if logged in
if ($user_id) {
    $listings->where('business_posts.user_id', '!=', $user_id);
}

$listings = $listings->get();

// Extract unique post IDs
$postIds = $listings->pluck('id')->unique();

// Filter listings to get only one record per post and include all resource names
$busuniqueListings = collect([]);
foreach ($postIds as $postId) {
$postListings = $listings->where('id', $postId);
$resourceNames = $postListings->pluck('resource_name')->implode(', ');
$uniqueListing = $postListings->first();
$uniqueListing->resource_names = $resourceNames;
$busuniqueListings->push($uniqueListing);
}
}

//SAB posts
if ($user_type !== 'consumer') {
$listings = SABPost::join('s_a_b_resource_posts', 's_a_b_resource_posts.post_id', 's_a_b_posts.id')
->join('resources', 'resources.id', 's_a_b_resource_posts.resource_type')
->select('s_a_b_posts.*', 'resources.resource_name');
if ($user_id) {
    $listings->where('s_a_b_posts.user_id', '!=', $user_id);
}

$listings = $listings->get();

// Extract unique post IDs
$postIds = $listings->pluck('id')->unique();

// Filter listings to get only one record per post and include all resource names
$sabuniqueListings = collect([]);
foreach ($postIds as $postId) {
$postListings = $listings->where('id', $postId);
$resourceNames = $postListings->pluck('resource_name')->implode(', ');
$uniqueListing = $postListings->first();
$uniqueListing->resource_names = $resourceNames;
$sabuniqueListings->push($uniqueListing);
}
}
//Consumer posts
$listings = ConsumerPost::join('consumer_resource_posts', 'consumer_resource_posts.post_id', 'consumer_posts.id')
->join('resources', 'resources.id', 'consumer_resource_posts.resource_type')
->select('consumer_posts.*', 'resources.resource_name');
if ($user_id) {
    $listings->where('consumer_posts.user_id', '!=', $user_id);
}

$listings = $listings->get();

// Extract unique post IDs
$postIds = $listings->pluck('id')->unique();

// Filter listings to get only one record per post and include all resource names
$conuniqueListings = collect([]);
foreach ($postIds as $postId) {
$postListings = $listings->where('id', $postId);
$resourceNames = $postListings->pluck('resource_name')->implode(', ');
$uniqueListing = $postListings->first();
$uniqueListing->resource_names = $resourceNames;
$conuniqueListings->push($uniqueListing);
}
if ($user_type == 'consumer') {
    return view('frontend/listings/listingslist',compact('conuniqueListings','user_type'));
}else if($user_type == 'sab'){
    return view('frontend/listings/listingslist',compact('conuniqueListings','user_type'));
}else if($user_type == 'business'){
    return view('frontend/listings/listingslist',compact('conuniqueListings','sabuniqueListings','user_type'));
}else{
    return view('frontend/listings/listingslist',compact('conuniqueListings','sabuniqueListings','busuniqueListings','user_type'));
}
}
public function con_listing_details($id) {
    // Check if the user is logged in

      $user_id = session()->get('user_id');
      $conpost = ConsumerPost::where('id',$id)->first();
      $post_id = $conpost->id;
     $u_id = $conpost->user_id;
      $user_type = session()->get('user_type');
    if (null === $user_id || $user_id === '') {
        // User is not logged in, redirect to the login page
        session()->put('redirect_to', route('con_listing_details', $id));
        return redirect()->route('consumer_login');
    }
// Fetch the user's role from the database
$user = DB::table('ecosansar_users')->where('id', $user_id)->first();
$conlistreviews = ConsumerReview::where('post_id',$id)->where('user_id',$u_id)->get();

if (($user && $user->user_type === 'business') || ($user && $user->user_type === 'sab') || ($user && $user->user_type === 'consumer')){
    // User is logged in as a consumer, proceed to fetch the listing details
    $consumerpostsres = ConsumerResourcePost::where('post_id', $id)->get();

    $consumerposts = ConsumerPost::join('weights', 'weights.id', 'consumer_posts.quantity')
        ->select('consumer_posts.*', 'weights.*')
        ->where('consumer_posts.id', $id)
        ->first();

    return view('frontend/listings/con_listing_details', compact('consumerpostsres', 'consumerposts','id','u_id','post_id','conlistreviews'));
}
// If the user is not logged in as a consumer, redirect to the login page
session()->put('redirect_to', route('con_listing_details', $id));
return redirect()->route('consumer_login');
}

public function sabs_listing_details($id){
      $user_id = session()->get('user_id');
    $user_type = session()->get('user_type');
    $sabpost = SABPost::where('id',$id)->first();
     $post_id = $sabpost->id;
    $u_id = $sabpost->user_id;
    if (null === $user_id || $user_id === '') {
        session()->put('redirect_to', route('sabs_listing_details', $id));
        return redirect()->route('sab_login'); // Redirect to the login page
    }
      // Fetch the user's role from the database
$user = DB::table('ecosansar_users')->where('id', $user_id)->first();
$sablistreviews = SABReview::where('post_id',$id)->where('user_id',$u_id)->get();
$sabenquiries = SabEnquiry::where('post_id',$id)->where('user_id',$u_id)->get();
if($sabenquiries->isEmpty()){

}else{
$enquiry_id = $sabenquiries[0]->id;
}
$sabenquirymsg = SABEnquiryMessages::where('post_id',$id)->where('user_id',$u_id)->get();
// echo "<pre>";
// print_r($sabenquiries);die;
if ($user && $user->user_type === 'business'){
    // User is logged in as a consumer, proceed to fetch the listing details
    $sabpostsres = SABResourcePost::where('post_id', $id)->get();

    $sabposts = SABPost::join('weights', 'weights.id', 's_a_b_posts.quantity')
        ->select('s_a_b_posts.*', 'weights.*')
        ->where('s_a_b_posts.id', $id)
        ->first();
        if($sabenquiries->isEmpty()){
    return view('frontend/listings/sab_listing_details',compact('sabposts','sabpostsres','id','u_id','post_id','sablistreviews','user_id','sabenquiries','sabenquirymsg'));
        }else{
            return view('frontend/listings/sab_listing_details',compact('sabposts','sabpostsres','id','u_id','post_id','sablistreviews','user_id','sabenquiries','enquiry_id','sabenquirymsg'));
        }
}else{
return redirect()->route('sab_login');
}
}
public function bus_listing_details($id){
    $user_id = session()->get('user_id');
    $user_type = session()->get('user_type');
    $buspost = BusinessPost::where('id',$id)->first();
    $post_id = $buspost->id;
   $u_id = $buspost->user_id;
    if (null === $user_id || $user_id === '') {
        session()->put('redirect_to', route('bus_listing_details', $id));
        return redirect()->route('business_login'); // Redirect to the login page
    }
    // Fetch the user's role from the database
$user = DB::table('ecosansar_users')->where('id', $user_id)->first();
// If the user is not logged in or their user_type is 'business', redirect to the business login page

if  ($user && $user->user_type === 'business'){
    // User is logged in as a consumer, proceed to fetch the listing details
    $buspostsres = BusinessResourcePost::where('post_id', $id)->get();

    $busposts = BusinessPost::join('weights', 'weights.id', 'business_posts.quantity')
        ->select('business_posts.*', 'weights.*')
        ->where('business_posts.id', $id)
        ->first();
    return view('frontend/listings/bus_listing_details',compact('buspostsres','busposts','id','u_id','post_id'));
}
// If the user is not logged in as a consumer, redirect to the login page
session()->put('redirect_to', route('bus_listing_details', $id));
return redirect()->route('business_login');
}
}




