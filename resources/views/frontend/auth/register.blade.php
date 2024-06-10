

@include('frontend.include.header')
@include('sweetalert::alert')
    <div id="page-content">
        <div class="container">
            <ul class="nav nav-tabs ultop">
                <li class="" ><a   href="{{ route('business_add') }}" class="btn btn-primary btn-small btn-rounded icon shadow add-listing"><span class="ultext">Business</span></a></li>
                <li><a  href="{{ route('sab_add') }}"><span class="ultext">SAB </span></a></li>
                <li><a  href="{{ route('consumer_add') }}"><span class="ultext">Consumer</span></a></li>
           </ul>

           <div class="row" >
            <div class="col-md-4 col-sm-4 col-md-offset-4 col-sm-offset-4">
                <section class="page-title">
                    <h1>Business Register</h1>
                </section
                <!--end page-title-->
                <section id="business">
                    <form class="form inputs-underline" action="{{ route('business.save') }}" method="post">
                        @csrf
                        <input type="hidden" name="user_type" value="business">
                        <div class="row">

                                <div class="form-group">
                                    <label for="name"> Business Name<span style="color:red;">*</span></label>
                                    <input onkeydown="return /[a-z ]/i.test(event.key)" type="text" class="form-control" name="name" id="name" placeholder="Business Name">
                                    @if ($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                </div>
                                <!--end form-group-->


                            <div class="form-group">
                                <label for="address">Address<span style="color:red;">*</span></label>
                                <input type="text" class="form-control" name="address" id="address" placeholder="Address">
                                @if ($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                            </div>
                            <!--end form-group-->
                            <div class="form-group">
                                <label for="pincode">Pincode<span style="color:red;">*</span></label>
                                <input onkeydown="return (event.keyCode >= 48 && event.keyCode <= 57) || event.keyCode == 8" type="text" class="form-control" name="pincode" id="pincode" placeholder="Pincode" minlength="6" maxlength="6">
                                @if ($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                            </div>
                            <!--end form-group-->
                            <!--end col-md-6-->

                                <div class="form-group">
                                    <label for="contact_person">Contact Person<span style="color:red;">*</span></label>
                                    <input onkeydown="return /[a-z ]/i.test(event.key)" type="text" class="form-control" name="contact_person" id="contact_person" placeholder="Contact Person">
                                    @if ($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                </div>
                                <!--end form-group-->


                                <div class="form-group">
                                    <label for="mobile">Phone number<span style="color:red;">*</span></label>
                                    <input onkeydown="return (event.keyCode >= 48 && event.keyCode <= 57) || event.keyCode == 8" type="text" class="form-control" name="mobile" id="mobile" placeholder="Phone number" minlength="10" maxlength="10">
                                    @if ($errors->has('mobile'))
                                            <span class="text-danger">{{ $errors->first('mobile') }}</span>
                                        @endif
                                </div>
                                <!--end form-group-->

                            <!--end col-md-6-->
                            <div class="form-group">
                                <label for="email">Email id<span style="color:red;">*</span></label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                                @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                            </div>
                            <div class="form-group">
                                <label for="password">Password<span style="color:red;">*</span></label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                                @if ($errors->has('password'))
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                        @endif
                            </div>
                            <div class="form-group">
                                <label for="gst">GST Number<span style="color:red;">*</span></label>
                                <input type="text" class="form-control" name="gst" id="gst" placeholder="GST">
                                @if ($errors->has('gst'))
                                            <span class="text-danger">{{ $errors->first('gst') }}</span>
                                        @endif
                            </div>
                        </div>
                        <!--enr row-->


                        <!--end form-group-->

                            <div class="text-center ">
                            <button type="submit" class="btn btn-primary btn-small btn-rounded icon shadow add-listing  ">Register </button>
                            <a href="{{url('/')}}" class="btn btn-primary btn-small btn-rounded icon shadow add-listing  " style="padding: 13px;margin-top: -2px;margin-left:40px">Back</a>
                            </div>
                        <!--end form-group-->
                    </form>

                    {{--  <hr>

                    <p class="center">By clicking on “Register Now” button you are accepting the <a href="terms-conditions.html">Terms & Conditions</a></p>  --}}
                </section>


            </div>
            <!--col-md-4-->
        </div>







        </div>



        <!--end container-->
    </div>
    <!--end page-content-->

 @include('frontend/include/footer');

<script>
    function submitBusinessForm(event) {
        alert('business');
        // Form serialization and AJAX submission logic for Business form
        // Example:
        event.preventDefault();
        var formData = $('#businessForm').serialize();
        $.post('{{ route('business.save') }}', formData, function(response) {
            // Handle response if needed
        });
    }

    function submitSabForm() {
        // Prevent default form submission
        event.preventDefault();

        var formData = $('#sabForm').serialize();

        $.ajax({
            type: 'POST',
            url: '{{ route('sab.save') }}',
            data: formData,
            success: function(response) {
                // If registration is successful, redirect or show success message
                $('#sabForm')[0].reset();
                Swal.fire({
                    icon: 'success',
                    title: 'Registartion Successful!',
                    timer: 3000, // 3 seconds
                    timerProgressBar: true, // Show progress bar
                    onClose: () => {
                        // Reset form fields
                        // Clear form fields after success message is closed

                        setTimeout(function(){
                            // Redirect or reload after 3 seconds
                            // window.location.href = "/IIVRVF/public/";
                            window.location.reload();
                        }, 3000); // Wait for 3 seconds before redirecting or reloading
                    }
                });

                // Redirect or perform any other action as needed
            },
            error: function(xhr, status, error) {
                // Clear previous error messages
                $('.text-danger').remove();

                // Handle validation errors and display them as toast messages
                var errors = xhr.responseJSON.errors;
                alert(errors);
                $.each(errors, function(key, value) {
                    toastr.error(value[0], 'Validation Error');
                });
            }


        });
    }



    function submitConsumerForm(event) {
        alert('consumer');
        // Form serialization and AJAX submission logic for Consumer form
        // Example:
        event.preventDefault();
        var formData = $('#consumerForm').serialize();
        $.post('{{ route('consumer.save') }}', formData, function(response) {
            // Handle response if needed
        });
    }
</script>

</body>

