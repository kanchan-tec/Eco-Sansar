@include('frontend.include.header')
@include('sweetalert::alert')
<head>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>
    <div id="page-content">
        <div class="container">

            <div class="row" >
                <div class=" ">
                    <section class="page-title">
                        <h1>SAB Details</h1>
                    </section
                    <!--end page-title-->
                    <section id="business">
                        <form class="form inputs-underline" action="{{ route('sab_post_save') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ $user_id }}">
                            <div class="row">
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">  Name<span style="color:red;">*</span></label>
                                        <input type="text" class="form-control" name="name" id="name" placeholder=" Name" >
                                        @if ($errors->has('name'))
                                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                            @endif
                                    </div>
                                </div>
                                    <!--end form-group-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="mobile">Phone number<span style="color:red;">*</span></label>
                                            <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Phone number" >
                                            @if ($errors->has('mobile'))
                                                    <span class="text-danger">{{ $errors->first('mobile') }}</span>
                                                @endif
                                        </div>
                                        </div>
                                        <!--end form-group-->
                            </div>
                            <div class="row">
                                    <!--end col-md-6-->
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email id<span style="color:red;">*</span></label>
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Email" >
                                        @if ($errors->has('email'))
                                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                                @endif
                                    </div>
                                    </div>
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address">Address<span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" name="address" id="address" placeholder="Address" >
                                    @if ($errors->has('address'))
                                                <span class="text-danger">{{ $errors->first('address') }}</span>
                                            @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address">Latitude<span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" name="latitude" id="latitude" placeholder="Latitude" >
                                    @if ($errors->has('latitude'))
                                                <span class="text-danger">{{ $errors->first('latitude') }}</span>
                                            @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address">Longitude<span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" name="longitude" id="longitude" placeholder="Longitude" >
                                    @if ($errors->has('longitude'))
                                                <span class="text-danger">{{ $errors->first('longitude') }}</span>
                                            @endif
                                </div>
                            </div>


                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address">Pincode<span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" name="pincode" id="pincode" placeholder="Pincode"  >
                                    @if ($errors->has('pincode'))
                                                <span class="text-danger">{{ $errors->first('pincode') }}</span>
                                            @endif
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address">For Sale/Giveaway<span style="color:red;">*</span></label><br><br>
                                <input class="form-control" type="radio" id="sale_giveaway" name="sale_giveaway" value="Sale">
                                <label for="age1">For Sale</label>&emsp;
                                <input class="form-control" type="radio" id="sale_giveaway" name="sale_giveaway" value="Giveaway">
                                <label for="age2">For Giveaway</label>
                                @if ($errors->has('sale_giveaway'))
                                <span class="text-danger">{{ $errors->first('sale_giveaway') }}</span>
                            @endif
                                    </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label  >Quantity - Weight / Number of pieces<span style="color:red;">*</span></label>
                                                    <select class="form-select" name="quantity" id="quantity"  >
                                                        <option value="">Select</option>
                                                        @foreach($weights as $wat)
                                                    <option value="{{ $wat->id }}"
                                                    >{{ $wat->min_weight }} {{ $wat->min_measure }} {{ 'to' }} {{ $wat->max_weight }} {{ $wat->max_measure }}</option>
                                                @endforeach
                                                    </select>
                                                    @if ($errors->has('quantity'))
                                                    <span class="text-danger">{{ $errors->first('quantity') }}</span>
                                                @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="address">Condition  <span style="color:red;">*</span></label><br><br>
                                    <input class="form-control" type="radio" id="clean_unclean" name="clean_unclean" value="Clean">
                                    <label for="age1">Clean</label>&emsp;
                                    <input class="form-control" type="radio" id="clean_unclean" name="clean_unclean" value="Unclean">
                                    <label for="age2">Unclean</label>
                                    @if ($errors->has('clean_unclean'))
                                    <span class="text-danger">{{ $errors->first('clean_unclean') }}</span>
                                @endif
                                        </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="address">Packaged<span style="color:red;">*</span></label><br><br>
                                    <input class="form-control" type="radio" id="packaged" name="packaged" value="Yes">
                                    <label for="age1">Yes</label>&emsp;
                                    <input class="form-control" type="radio" id="packaged" name="packaged" value="No">
                                    <label for="age2">No</label>
                                    @if ($errors->has('packaged'))
                                    <span class="text-danger">{{ $errors->first('packaged') }}</span>
                                @endif
                                        </div>
                                </div>
                            </div>
                            <!--enr row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="address">Image<span style="color:red;">*</span></label><br><br>
                                        <input type="file" class="form-control" name="post_pic" id="post_pic" placeholder="Pincode"  >
                                        @if ($errors->has('post_pic'))
                                                    <span class="text-danger">{{ $errors->first('post_pic') }}</span>
                                                @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="address">Type of Resource<span style="color:red;">*</span></label><br><br>
                                        <select class="form-select js-example" name="resource_type[]" id="resource_type" multiple="multiple" aria-label="Default select example">
                                            <option value="">Select resource</option>
                                            <!-- Assuming $resources is an array of resources -->
                                            @foreach($resources as $res)
                                            <option value="{{ $res->id }}">{{ $res->resource_name }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('resource_type'))
                                    <span class="text-danger">{{ $errors->first('resource_type') }}</span>
                                @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div id="dynamic-inputs">
                                    <!-- Dynamic input fields will be added here -->
                                </div>
                            </div>



                            <!--end form-group-->

                                <div class="text-center ">
                                <button type="submit" class="btn btn-primary btn-small btn-rounded icon shadow add-listing ">Post  </button>
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

   @include('frontend.include.footer');

   <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
   <script>
    $(document).ready(function() {
        $('.js-example').select2({
            placeholder: "Select Resource"
        });
    });
   </script>
   <script>
    $(document).ready(function(){
        $('#resource_type').change(function(){
            $('#dynamic-inputs').empty(); // Clear existing dynamic inputs
            $(this).find('option:selected').each(function(){
                var resourceId = $(this).val();
                var resourceName = $(this).text();
                var inputField = '<div class="col-md-6">' + '<div class="form-group">' +
                                    '<label for="resource_' + resourceId + '">Upload File for ' + resourceName + '</label>' +
                                    '<input type="file" class="form-control" name="resource_img[]" id="resource_' + resourceId + '">' +
                                    '</div>' +
                                    '</div>';
                $('#dynamic-inputs').append(inputField);
            });
        });
    });
</script>
</body>

