

@include('frontend.include.header')
@include('sweetalert::alert')
    <div id="page-content">
        <div class="container">
            <ul class="nav nav-tabs">
                <li class="active" ><a data-toggle="tab" href="#business_register">Business</a></li>
                <li><a data-toggle="tab" href="#sab_register">SAB </a></li>
                <li><a data-toggle="tab" href="#consumer_register">Consumer</a></li>
           </ul>
       <div class="tab-content">
        <div id="business_register" class="tab-pane fade in active">
            <form class="form inputs-underline" action="{{ route('business.save') }}" method="post">
                @csrf
                <input type="text" name="user_type" value="business">
                <div class="row">

                        <div class="form-group">
                            <label for="name"> Business Name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Business Name">
                            @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                        </div>
                        <!--end form-group-->


                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" name="address" id="address" placeholder="Address">
                        @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                    </div>
                    <!--end form-group-->
                    <div class="form-group">
                        <label for="pincode">Pincode</label>
                        <input type="text" class="form-control" name="pincode" id="pincode" placeholder="Pincode">
                        @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                    </div>
                    <!--end form-group-->
                    <!--end col-md-6-->

                        <div class="form-group">
                            <label for="contact_person">Contact Person </label>
                            <input type="text" class="form-control" name="contact_person" id="contact_person" placeholder="Contact Person">
                            @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                        </div>
                        <!--end form-group-->


                        <div class="form-group">
                            <label for="mobile">Phone number </label>
                            <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Phone number">
                            @if ($errors->has('mobile'))
                                    <span class="text-danger">{{ $errors->first('mobile') }}</span>
                                @endif
                        </div>
                        <!--end form-group-->

                    <!--end col-md-6-->
                    <div class="form-group">
                        <label for="email">Email id</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                        @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                        @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                    </div>
                    <div class="form-group">
                        <label for="gst">GST Number</label>
                        <input type="text" class="form-control" name="gst" id="gst" placeholder="GST">
                        @if ($errors->has('gst'))
                                    <span class="text-danger">{{ $errors->first('gst') }}</span>
                                @endif
                    </div>
                </div>
                <!--enr row-->


                <!--end form-group-->
                <div class="form-group center">
                    <button type="submit" class="btn btn-primary width-100" >Register Now</button>
                </div>
                <!--end form-group-->
            </form>

         </div>

<div  id="sab_register" class="tab-pane fade">
             </br>
             <form class="form inputs-underline" action="{{ route('sab.save') }}" method="post">
                @csrf
                <input type="text" name="user_type" value="sab">
                <div class="row">

                        <div class="form-group">
                            <label for="name">  Name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder=" Name">
                        </div>
                        <!--end form-group-->


                        <div class="form-group">
                            <label for="mobile">Phone number </label>
                            <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Phone number">
                        </div>
                        <!--end form-group-->

                    <!--end col-md-6-->

                    <div class="form-group">
                        <label for="address">Location</label>
                        <input type="text" class="form-control" name="address" id="address" placeholder="Location">
                    </div>
                    <!--end form-group-->
                    <div class="form-group">
                        <label for="pincode">Pincode</label>
                        <input type="text" class="form-control" name="pincode" id="pincode" placeholder="Pincode">
                    </div>
                    <!--end form-group-->
                    <!--end col-md-6-->

                        <div class="form-group">
                            <label for="latitude">Latitude </label>
                            <input type="text" class="form-control" name="latitude" id="latitude" placeholder="Latitude">
                        </div>
                        <!--end form-group-->


                        <div class="form-group">
                            <label for="longitude">Longitude </label>
                            <input type="text" class="form-control" name="longitude" id="longitude" placeholder="Longitude">
                        </div>
                        <!--end form-group-->
                    </div>
                <!--end form-group-->
                <div class="form-group center">
                    <button type="submit" class="btn btn-primary width-100">Register Now</button>
                </div>
                <!--end form-group-->
            </form>

</div>


<div id="consumer_register" class="tab-pane fade">
    <form class="form inputs-underline" action="{{ route(consumer.save) }}" method="post">
        @csrf

<input type="text" value="consumer">
        <div class="row">

                <div class="form-group">
                    <label for="first_name"> Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                </div>
                <!--end form-group-->

            <!--end col-md-6-->

                <div class="form-group">
                    <label for="last_name">Phone number </label>
                    <input type="text" class="form-control" name="phone_no" id="phone_no" placeholder="Phone number">
                </div>
                <!--end form-group-->

            <!--end col-md-6-->

        <!--enr row-->
        <div class="form-group">
            <label for="email">Address</label>
            <input type="text" class="form-control" name="address" id="address" placeholder="Address">
        </div>
        <!--end form-group-->
        <div class="form-group">
            <label for="password">Pincode</label>
            <input type="text" class="form-control" name="pincode" id="pincode" placeholder="Pincode">
        </div>
        <!--end form-group-->
        <div class="form-group">
        <label class=" form-label">Type of residences</label>
                        <select class="form-select" name="category" id="category" required>
                            <option value="">Select</option>
                            <option  value="General Inquiry">General Inquiry</option>
                            <option  value="Technical Support">Technical Support</option>
                        </select>
        </div>
        <div class="form-group">
            <label for="confirm_password">Email id</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Email">
        </div>
    </div>
        <!--end form-group-->
        <div class="form-group center">
            <button type="submit" class="btn btn-primary width-100">Register Now</button>
        </div>
        <!--end form-group-->
    </form>



</div>


</div>
</div>

        </div>


        <!--end container-->
    </div>
    <!--end page-content-->

    <footer id="page-footer">
        <div class="footer-wrapper">
            <div class="block">
                <div class="container">
                    <div class="vertical-aligned-elements">
                        <div class="element width-50">
                            <p data-toggle="modal" data-target="#myModal">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque aliquam at neque sit amet vestibulum. <a href="#">Terms of Use</a> and <a href="#">Privacy Policy</a>.</p>
                        </div>
                        <div class="element width-50 text-align-right">
                            <a href="#" class="circle-icon"><i class="social_twitter"></i></a>
                            <a href="#" class="circle-icon"><i class="social_facebook"></i></a>
                            <a href="#" class="circle-icon"><i class="social_youtube"></i></a>
                        </div>
                    </div>
                    <div class="background-wrapper">
                        <div class="bg-transfer opacity-50">
                            <img src="frontend/assets/img/footer-bg.png" alt="">
                        </div>
                    </div>
                    <!--end background-wrapper-->
                </div>
            </div>
            <div class="footer-navigation">
                <div class="container">
                    <div class="vertical-aligned-elements">
                        <div class="element width-50">(C) 2016 Your Company, All right reserved</div>
                        <div class="element width-50 text-align-right">
                            <a href="index.html">Home</a>
                            <a href="listing-grid-right-sidebar.html">Listings</a>
                            <a href="submit.html">Submit Item</a>
                            <a href="contact.html">Contact</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--end page-footer-->
</div>
<!--end page-wrapper-->
<a href="#" class="to-top scroll" data-show-after-scroll="600"><i class="arrow_up"></i></a>

<script type="text/javascript" src="frontend/assets/js/jquery-2.2.1.min.js"></script>
<script type="text/javascript" src="frontend/assets/js/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="frontend/assets/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="frontend/assets/js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyBEDfNcQRmKQEyulDN8nGWjLYPm8s4YB58&libraries=places"></script>
<script type="text/javascript" src="frontend/assets/js/richmarker-compiled.js"></script>
<script type="text/javascript" src="frontend/assets/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="frontend/assets/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="frontend/assets/js/custom.js"></script>
<script type="text/javascript" src="frontend/assets/js/maps.js"></script>

<script>

</script>

</body>

