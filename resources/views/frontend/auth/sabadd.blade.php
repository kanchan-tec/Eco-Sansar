@include('frontend.include.header')
@include('sweetalert::alert')
    <div id="page-content">
        <div class="container">

            <div class="row" >
                <div class="col-md-4 col-sm-4 col-md-offset-4 col-sm-offset-4">
                    <section class="page-title">
                        <h1>Register</h1>
                    </section
                    <!--end page-title-->
                    <section id="sab" >
                        <form class="form inputs-underline" action="{{ route('sab.save') }}" method="post">
                            @csrf
                            <input type="hidden" name="user_type" value="sab">
                            <div class="row">

                                    <div class="form-group">
                                        <label for="name">  Name<span style="color:red;">*</span></label>
                                        <input type="text" class="form-control" name="name" id="name" placeholder=" Name">
                                    </div>
                                    <!--end form-group-->


                                    <div class="form-group">
                                        <label for="mobile">Phone number<span style="color:red;">*</span> </label>
                                        <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Phone number">
                                    </div>
                                    <!--end form-group-->

                                <!--end col-md-6-->

                                <div class="form-group">
                                    <label for="address">Location<span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" name="address" id="address" placeholder="Location">
                                </div>
                                <!--end form-group-->
                                <div class="form-group">
                                    <label for="pincode">Pincode<span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" name="pincode" id="pincode" placeholder="Pincode">
                                </div>
                                <!--end form-group-->
                                <!--end col-md-6-->

                                    <div class="form-group">
                                        <label for="latitude">Latitude<span style="color:red;">*</span> </label>
                                        <input type="text" class="form-control" name="latitude" id="latitude" placeholder="Latitude">
                                    </div>
                                    <!--end form-group-->


                                    <div class="form-group">
                                        <label for="longitude">Longitude<span style="color:red;">*</span> </label>
                                        <input type="text" class="form-control" name="longitude" id="longitude" placeholder="Longitude">
                                    </div>
                                    <!--end form-group-->
                                </div>
                            <!--end form-group-->
                            <div class="text-center ">
                                <button type="submit" class="btn btn-primary ">Register Now</button>
                                <a href="{{route('user_type')}}" class="btn btn-primary " style="padding: 13px;margin-top: -2px;margin-left:40px">Back</a>
                                </div>
                            <!--end form-group-->
                        </form>

                        <hr>

                        <p class="center">By clicking on “Register Now” button you are accepting the <a href="terms-conditions.html">Terms & Conditions</a></p>
                    </section>


                </div>
                <!--col-md-4-->
            </div>
            <!--end ro-->
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



</body>

