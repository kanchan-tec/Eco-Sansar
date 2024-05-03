@include('frontend.include.header')
@include('sweetalert::alert')
    <div id="page-content">
        <div class="container">
            <ul class="nav nav-tabs ultop">
                <li ><a   href="{{ route('business_add') }}"><span class="ultext">Business</span></a></li>
                <li  class=""><a  href="{{ route('sab_add') }}" class="btn btn-primary btn-small btn-rounded icon shadow add-listing"><span class="ultext">SAB</span> </a></li>
                <li><a  href="{{ route('consumer_add') }}"><span class="ultext">Consumer</span></a></li>
           </ul>
            <div class="row" >
                <div class="col-md-4 col-sm-4 col-md-offset-4 col-sm-offset-4">
                    <section class="page-title">
                        <h1>SAB Register</h1>
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
                                        @if ($errors->has('name'))
                                             <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                    <!--end form-group-->


                                    <div class="form-group">
                                        <label for="mobile">Phone number<span style="color:red;">*</span> </label>
                                        <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Phone number">
                                        @if ($errors->has('mobile'))
                                        <span class="text-danger">{{ $errors->first('mobile') }}</span>
                                    @endif
                                    </div>
                                    <!--end form-group-->

                                <!--end col-md-6-->

                                <div class="form-group">
                                    <label for="address">Location<span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" name="address" id="address" placeholder="Location">
                                    @if ($errors->has('address'))
                                        <span class="text-danger">{{ $errors->first('address') }}</span>
                                    @endif
                                </div>
                                <!--end form-group-->
                                <div class="form-group">
                                    <label for="pincode">Pincode<span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" name="pincode" id="pincode" placeholder="Pincode">
                                    @if ($errors->has('pincode'))
                                        <span class="text-danger">{{ $errors->first('pincode') }}</span>
                                     @endif
                                </div>
                                <!--end form-group-->
                                <!--end col-md-6-->

                                    <div class="form-group">
                                        <label for="latitude">Latitude<span style="color:red;">*</span> </label>
                                        <input type="text" class="form-control" name="latitude" id="latitude" placeholder="Latitude">
                                        @if ($errors->has('latitude'))
                                        <span class="text-danger">{{ $errors->first('latitude') }}</span>
                                     @endif
                                    </div>
                                    <!--end form-group-->
                                    <div class="form-group">
                                        <label for="longitude">Longitude<span style="color:red;">*</span> </label>
                                        <input type="text" class="form-control" name="longitude" id="longitude" placeholder="Longitude">
                                        @if ($errors->has('longitude'))
                                        <span class="text-danger">{{ $errors->first('longitude') }}</span>
                                     @endif
                                    </div>
                                    <!--end form-group-->
                                </div>
                            <!--end form-group-->
                            <div class="text-center ">
                                <button type="submit" class="btn btn-primary btn-small btn-rounded icon shadow add-listing ">Register </button>
                                <a href="{{url('/')}}" class="btn btn-primary btn-small btn-rounded icon shadow add-listing " style="padding: 13px;margin-top: -2px;margin-left:40px">Cancel</a>
                                </div>
                            <!--end form-group-->
                        </form>

                        {{--  <hr>

                        <p class="center">By clicking on “Register Now” button you are accepting the <a href="terms-conditions.html">Terms & Conditions</a></p>  --}}
                    </section>


                </div>
                <!--col-md-4-->
            </div>
            <!--end ro-->
        </div>
        <!--end container-->
    </div>
    <!--end page-content-->

    @include('frontend/include/footer');



</body>

