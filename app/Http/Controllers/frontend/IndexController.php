<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\frontend\EcosansarUsers;
use App\Models\frontend\ConsumerPost;
use App\Models\frontend\ConsumerResourcePost;
use App\Models\frontend\SABPost;
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
            'mobile' => 'required|numeric|min:10|max:10',
            'email' => 'required|email',
            'address' => 'required',
            'gst' => 'required'
        ]);

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
            'mobile' => 'required|numeric|min:10|max:10',
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
            'mobile' => 'required|numeric|min:10|max:10',
            'address' => 'required',
            'email' =>'required',
            'type_of_residences' => 'required'
        ]);
        $user = new EcosansarUsers;
        $user->name = $req->name;
        $user->mobile = $req->mobile;
        $user->address = $req->address;
        $user->pincode = $req->pincode;
        $user->type_of_residences = $req->type_of_residences;
        $user->email = $req->email;
        $user->user_type = $req->user_type;
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

        // Verify the password
        if ($user && Hash::check($input['password'], $user->password)) {
            // Authentication successful, redirect to business details page
            session()->put('user_id', $user->id);
            return redirect()->route('business_posts');
        } else {
            // Authentication failed, redirect back to login with error message
            return redirect()->route('business_login')->withErrors([
                'password' => 'You have entered an incorrect password.',
            ])->withInput();
        }
    }
    public function business_post_save(Request $request){
        // echo "<pre>";
        // print_r($req->all());die;
         $user_id = session()->get('user_id');

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
            $aadhar_filenm = $request->name.".".$aadhar_fileexe;
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
       // $listings = ConsumerPost::
       // where('user_id',$user_id)->get();
       // $listings = ConsumerPost::join('consumer_resource_posts','consumer_resource_posts.post_id','consumer_posts.id')
       // ->join('resources','resources.id','consumer_resource_posts.resource_type')
       // ->select('consumer_posts.*','resources.resource_name')
       // ->where('consumer_posts.user_id',$user_id)->get()->unique();
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
        if ($user && ($input['otp'] == $user->otp)) {
            // Authentication successful, redirect to business details page
            session()->put('user_id', $user->id);
            return redirect()->route('sab_posts');
        } else {
            // Authentication failed, redirect back to login with error message
            return redirect()->route('sab_login')->withErrors([
                'mobile' => 'The provided phone number is not registered.',
                'otp' => 'You have entered an incorrect otp.',
            ])->withInput();
        }
    }
    public function sab_posts(){
        $user_id = session()->get('user_id');
       // $listings = ConsumerPost::
       // where('user_id',$user_id)->get();
       // $listings = ConsumerPost::join('consumer_resource_posts','consumer_resource_posts.post_id','consumer_posts.id')
       // ->join('resources','resources.id','consumer_resource_posts.resource_type')
       // ->select('consumer_posts.*','resources.resource_name')
       // ->where('consumer_posts.user_id',$user_id)->get()->unique();
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
        $resources = Resource::get();
        $weights =Weight::get();
        return view('frontend/userdetails/sabdetails',compact('user_id','resources','weights'));
    }
    public function sab_post_save(Request $request){
        // echo "<pre>";
        // print_r($req->all());die;
         $user_id = session()->get('user_id');

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
        if ($user && ($input['otp'] == $user->otp)) {
            // Authentication successful, redirect to business details page
         // Store user_id in the session
        session()->put('user_id', $user->id);

            return redirect()->route('consumer_posts');
        } else {
            // Authentication failed, redirect back to login with error message
            return redirect()->route('consumer_login')->withErrors([
                'mobile' => 'The provided phone number is not registered.',
                'otp' => 'You have entered an incorrect otp.',
            ])->withInput();
        }
    }
    public function consumer_posts(){
         $user_id = session()->get('user_id');
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
       $users = EcosansarUsers::where('id',$user_id)->first();
       $resources = Resource::get();
       $weights =Weight::get();
        return view('frontend/userdetails/consumerdetails',compact('users','user_id','resources','weights'));
    }
    public function consumer_post_save(Request $request){
        // echo "<pre>";
        // print_r($req->all());die;
         $user_id = session()->get('user_id');

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

}




