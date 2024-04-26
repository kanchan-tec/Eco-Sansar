@include('frontend.include.header')

    <div id="page-content">
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li><a href="#">Pages</a></li>
                <li class="active">Contact</li>
            </ol>
            <!--end breadcrumb-->

            <!--tab start-->
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item" role="presentation">
                  <a class="nav-link active" id="simple-tab-0" onclick="business()" data-bs-toggle="tab" href="#simple-tabpanel-0" role="tab" aria-controls="simple-tabpanel-0" aria-selected="true">Business</a>
                </li>
                <li class="nav-item" role="presentation">
                  <a class="nav-link" id="simple-tab-1" onclick="sab()" data-bs-toggle="tab" href="#simple-tabpanel-1" role="tab" aria-controls="simple-tabpanel-1" aria-selected="false">SAB</a>
                </li>
                <li class="nav-item" role="presentation">
                  <a class="nav-link" id="simple-tab-2" onclick="consumer()" data-bs-toggle="tab" href="#simple-tabpanel-2" role="tab" aria-controls="simple-tabpanel-2" aria-selected="false">Consumer</a>
                </li>
              </ul>


              <!--tab end-->

            <div class="row" >
                <div class="col-md-4 col-sm-4 col-md-offset-4 col-sm-offset-4">
                    <section class="page-title">
                        <h1>Register</h1>
                    </section
                    <!--end page-title-->
                    <section id="business">
                        <form class="form inputs-underline" action="" method="post">
                            <div class="row">

                                    <div class="form-group">
                                        <label for="first_name"> Business Name</label>
                                        <input type="text" class="form-control" name="business_name" id="business_name" placeholder="Business Name">
                                    </div>
                                    <!--end form-group-->


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
                                <!--end col-md-6-->

                                    <div class="form-group">
                                        <label for="last_name">Contact Person </label>
                                        <input type="text" class="form-control" name="contact_person" id="contact_person" placeholder="Contact Person">
                                    </div>
                                    <!--end form-group-->


                                    <div class="form-group">
                                        <label for="last_name">Phone number </label>
                                        <input type="text" class="form-control" name="phone_no" id="phone_no" placeholder="Phone number">
                                    </div>
                                    <!--end form-group-->

                                <!--end col-md-6-->
                                <div class="form-group">
                                    <label for="confirm_password">Email id</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label for="confirm_password">Password</label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label for="confirm_password">GST</label>
                                    <input type="text" class="form-control" name="gst" id="gst" placeholder="GST">
                                </div>
                            </div>
                            <!--enr row-->


                            <!--end form-group-->
                            <div class="form-group center">
                                <button type="submit" class="btn btn-primary width-100">Register Now</button>
                            </div>
                            <!--end form-group-->
                        </form>

                        <hr>

                        <p class="center">By clicking on “Register Now” button you are accepting the <a href="terms-conditions.html">Terms & Conditions</a></p>
                    </section>

                    <section id="sab" style="display: none;">
                        <form class="form inputs-underline" action="" method="post">
                            <div class="row">

                                    <div class="form-group">
                                        <label for="first_name">  Name</label>
                                        <input type="text" class="form-control" name="name" id="name" placeholder=" Name">
                                    </div>
                                    <!--end form-group-->


                                    <div class="form-group">
                                        <label for="last_name">Phone number </label>
                                        <input type="text" class="form-control" name="phone_no" id="phone_no" placeholder="Phone number">
                                    </div>
                                    <!--end form-group-->

                                <!--end col-md-6-->

                                <div class="form-group">
                                    <label for="email">Location</label>
                                    <input type="text" class="form-control" name="address" id="address" placeholder="Location">
                                </div>
                                <!--end form-group-->
                                <div class="form-group">
                                    <label for="password">Pincode</label>
                                    <input type="text" class="form-control" name="pincode" id="pincode" placeholder="Pincode">
                                </div>
                                <!--end form-group-->
                                <!--end col-md-6-->

                                    <div class="form-group">
                                        <label for="last_name">Latitude </label>
                                        <input type="text" class="form-control" name="latitude" id="latitude" placeholder="Latitude">
                                    </div>
                                    <!--end form-group-->


                                    <div class="form-group">
                                        <label for="last_name">Longitude </label>
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

                        <hr>

                        <p class="center">By clicking on “Register Now” button you are accepting the <a href="terms-conditions.html">Terms & Conditions</a></p>
                    </section>



                    <section id="consumer" style="display: none;">
                        <form class="form inputs-underline" actio="" method="post">
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

<script>
function sab()
{
    let bus=document.getElementById('business');
   let sab=document.getElementById('sab');
   let con=document.getElementById('consumer');

   sab.style.display="block";
   bus.style.display="none";
   con.style.display="none";


}

function business()
{
    let bus=document.getElementById('business');
   let sab=document.getElementById('sab');
   let con=document.getElementById('consumer');

   sab.style.display="none";
   bus.style.display="block";
   con.style.display="none";


}

function consumer()
{
    let bus=document.getElementById('business');
   let sab=document.getElementById('sab');
   let con=document.getElementById('consumer');

   sab.style.display="none";
   bus.style.display="none";
   con.style.display="block";


}
</script>

</body>

