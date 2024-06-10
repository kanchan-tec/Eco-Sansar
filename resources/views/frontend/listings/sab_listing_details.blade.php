<style>
    /* Style for star ratings */
    .star-rating1 {
        unicode-bidi: bidi-override;
        direction: ltr; /* Set to left-to-right */
        text-align: center;
    }

    .star-rating1 span {
        display: inline-block;
        position: relative;
        width: 1.1em;
        font-size: 31px;
        cursor: pointer;
        color:transparent;
    }

    .star-rating1 span:before {
       content: "\2606";
        position: absolute;
        color: #FFD700;
    }

    .star-rating1 span.highlight {

        color: #FFD700; /* Yellow */
    }
    .logoimg{
        width : auto ;
height:36px;
    }
    input{
        font-family: sans-serif !important;
    }
    textarea{
        width: 80%;
        border-radius: 20px;
        padding: 10px;
    }


@media (max-width:767px){
.rt-container {
    padding-left:2px;
    padding-right:2px;
}
.ScriptHeader{
    padding-top: 2px;
}
}
.align-right {
    text-align: right;
    margin-left: auto;
    margin-right: 0;
    background-color: #f1f1f1;
    padding: 10px;
    border-radius: 5px;
    margin-bottom: 10px;
}

.align-left {
    text-align: left;
    margin-right: auto;
    margin-left: 0;
    background-color: #e1e1e1;
    padding: 10px;
    border-radius: 5px;
    margin-bottom: 10px;
}

.align-right span,
.align-left span {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
}

</style>
@include('frontend.include.header')
@include('sweetalert::alert')

<div id="page-content">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="#">Pages</a></li>
            <li class="active">Contact</li>
        </ol>
        <section class="page-title pull-left">
            <h1>{{ $sabposts->name }}</h1>

        </section>
        <!--end page-title-->
        <a href="#write-a-review" class="btn btn-primary btn-framed btn-rounded btn-light-frame icon scroll pull-right"><i class="fa fa-star"></i>Write a review</a>
    </div>
    <!--end container-->
    <section>
        <div class="gallery detail">
            <div class="owl-carousel" data-owl-items="3" data-owl-loop="1" data-owl-auto-width="1" data-owl-nav="1" data-owl-dots="0" data-owl-margin="2" data-owl-nav-container="#gallery-nav">
                @foreach($sabpostsres as $consumerpost)
                <div class="image">
                    <div class="bg-transfer"><img src="{{ asset('frontend/assets/img/SABposts/'.$consumerpost->resource_img) }}" alt=""></div>
                </div>
            @endforeach

            </div>
            <!--end owl-carousel-->
        </div>
        <!--end gallery-->
    </section>
    <div class="container">
        <div class="row">
            <div class="col-md-7 col-sm-7">
                <div id="gallery-nav"></div>
                <section>
                    <h2>About this listing</h2>
                    <dl>
                        <dt>Sale/Giveaway</dt>
                        <dd>{{ $sabposts->sale_giveaway }}</dd>
                        <dt>Quantity</dt>
                        <dd>{{ $sabposts->min_weight }} {{ $sabposts->min_measure }} {{ 'to' }} {{ $sabposts->max_weight }} {{ $sabposts->max_measure }}</dd>
                        <dt>Sale/Giveaway</dt>
                        <dd>{{ $sabposts->clean_unclean }}</dd>
                        <dt>Packaged</dt>
                        <dd>{{ $sabposts->packaged }}</dd>
                    </dl>
                </section>
                <section>
                    <h2>Reviews</h2>
                    <div class="review">

                        @foreach($sablistreviews as $review)
                        <div class="description">
                            <figure>
                                <div class="rating-passive" data-rating="{{ $review->rating }}">
                                    <span class=" ">{{ $review->title }}</span>
                                    <span class="stars"></span>
                                    <span class="reviews">{{ $review->rating }}</span>
                                </div>
                            </figure>
                            <p>{{ $review->message }}</p> <!-- Assuming content is your review content -->
                        </div>
                        @endforeach

                    </div>
                    <!--end review-->


                </section>
                <section id="write-a-review">
                    <h2>Write a Review</h2>
                    <form class="clearfix form inputs-underline" action="{{ route('review.sab_save') }}" method="POST">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $u_id }}">
                        <input type="hidden" name="post_id" value="{{ $post_id }}">
                        <div class="box">
                            <div class="comment">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="comment-title">
                                            <h4>Review your experience</h4>
                                        </div>
                                        <!--end title-->
                                        <div class="form-group">
                                            <label for="name">Title of your review<em>*</em></label>
                                            <input type="text" class="form-control" id="title" name="title" >
                                        </div>
                                        <div class="form-group">
                                            <label for="message">Your Message<em>*</em></label>
                                            <textarea class="form-control" id="message" rows="8" name="message"  ="" ></textarea>
                                        </div>
                                        <!--end form-group-->
                                    </div>
                                    <!--end col-md-8-->
                                    <div class="col-md-4">
                                        <div class="comment-title">
                                            <h4>Rating</h4>
                                        </div>
                                        <!--end title-->
                                        <span class="star-rating1" id="star1">
                                            <span data-rating="1">&#9733;</span>
                                            <span data-rating="2">&#9733;</span>
                                            <span data-rating="3">&#9733;</span>
                                            <span data-rating="4">&#9733;</span>
                                            <span data-rating="5">&#9733;</span>
                                        </span>
                                        <input type="hidden" name="rating" id="rating" value="0">
                                    </div>
                                    <!--end col-md-4-->
                                </div>
                                <!--end row-->
                                <br>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-rounded">Send Review</button>
                                </div>
                                <!--end form-group-->
                            </div>
                            <!--end comment-->
                        </div>
                        <!--end review-->
                    </form>

                    <!--end form-->
                </section>
            </div>
            <!--end col-md-7-->
            @if($sabenquiries->isEmpty())
            <div class="col-md-5 col-sm-5">
                <div class="detail-sidebar">
                    <section class="shadow">
                        <h2>Enquiry form</h2>
                        <div class="content">
                            <form class="form form-email inputs-underline"  action="{{ route('enquiry.sab_save') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $id }}">
                                <input type="hidden" name="loginid" value="{{ $user_id }}">
                                <div class="row justify-content-center align-items-center">
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label for="name">Name<span style="color:red;">*</span></label>
                                            <input type="text" class="form-control" name="name" id="name">
                                            @if ($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                        </div>
                                        <!--end form-group-->
                                    </div>
                                </div>
                                <div class="row">
                                    <!--end col-md-4-->
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label for="email">Email<span style="color:red;">*</span></label>
                                            <input type="email" class="form-control" name="email" id="email">
                                            @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                        </div>
                                        <!--end form-group-->
                                    </div>
                                </div>
                                    <!--end col-md-4-->
                                    <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label for="subject">Phone no<span style="color:red;">*</span></label>
                                            <input type="text" class="form-control" name="mobile" id="mobile">
                                            @if ($errors->has('mobile'))
                                            <span class="text-danger">{{ $errors->first('mobile') }}</span>
                                        @endif
                                        </div>
                                        <!--end form-group-->
                                    </div>
                                    <!--end col-md-4-->
                                </div>
                                <!--end row-->
                                <div class="form-group">
                                    <label for="message">Message<span style="color:red;">*</span></label>
                                    <textarea class="form-control" id="message" rows="4" name="message"></textarea>
                                    @if ($errors->has('message'))
                                    <span class="text-danger">{{ $errors->first('message') }}</span>
                                @endif
                                </div>
                                <!--end form-group-->
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-rounded">Send Message</button>
                                </div>
                                <!--end form-group-->
                            </form>
                        </div>
                    </section>

                </div>
                <!--end detail-sidebar-->
            </div>
            <!--end col-md-5-->
            @else
            <div class="col-md-5 col-sm-5">
                <div class="detail-sidebar">
                    <section class="shadow">

                        <h2>Enquiries</h2>
                        <div class="content">
                            @foreach($sabenquiries as $review)
                            <div class="description review-item" data-id="{{ $review->id }}" style="cursor: pointer;">
                                <figure>
                                    <div class="rating-passive" data-rating="{{ $review->rating ?? ' ' }}">
                                        <span class="reviewer-name">Name: {{ $review->name }}</span>
                                    </div>
                                </figure>
                                <p>Message: {{ $review->message }}</p>
                                <div class="additional-details hidden">
                                    <p>Email: {{ $review->email }}</p>
                                    <p>Mobile: {{ $review->mobile }}</p>

                                    {{--  <div class="align-right">
                                        <span>Postadmin</span>
                                        <p>{{ $review->post_admin_message }}</p>
                                    </div>  --}}
                                    <!-- Display chat messages -->
                                    @foreach($sabenquirymsg as $message)
                                        @if($message->type == 'admin')
                                            <div class="align-left">
                                                <span>Admin</span>
                                                <p>{{ $message->adminmessage }}</p>
                                            </div>
                                        @else
                                            <div class="align-right">
                                                <span>You</span>
                                                <p>{{ $message->usermessage }}</p>
                                            </div>
                                        @endif
                                    @endforeach

                                    <div class="row justify-content-center align-items-center">
                                        <div class="col-lg-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    {{--  <h4 class="card-title">Form layouts</h4>  --}}
                                                    <div class="row ">
                                                        <div class="col-lg-12">
                                                            <div class="mt-4">
                                    <form action="{{ route('loginsab_send_enquiry') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="email" value="{{ $review->email }}">
                                        <input type="hidden" name="enquiryid" value="{{ $review->id }}">
                                        <input type="hidden" name="login_id"  value="{{ $user_id }}">
                                        <input type="hidden" name="user_id" value="{{ $u_id }}">
                                        <input type="hidden" name="post_id" value="{{ $id }}">
                                        <input type="hidden" name="enquiry_id" value="{{ $enquiry_id }}">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="formrow-password-input">Enter message</label><br>
                                                    <textarea   placeholder="Enter your message" class="message-textarea" rows="3" name="message"></textarea>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                         <button class="send-button mt-3 btn btn-primary btn-small btn-rounded icon"  >Send</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </section>
                </div>
                <!--end detail-sidebar-->
            </div>
            <!--end col-md-5-->
            @endif






</div>
<!--end row-->
</div>
<!--end container-->


@include('frontend.include.footer');

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const starRatingContainers = document.querySelectorAll('#star1');
      var inputhidden = document.getElementById("rating");

        starRatingContainers.forEach(container => {
            const stars = container.querySelectorAll('span');
            //const hiddenInput = container.nextElementSibling; // Use nextElementSibling

            stars.forEach(star => {
        star.addEventListener('click', () => {
            const rating = star.getAttribute('data-rating');
            inputhidden.value=rating;
            //hiddenInput.value = rating; // Update the hidden input field
            console.log('Rating: ' + rating); // Add this line

            // Highlight stars from the first star to the clicked star
            stars.forEach(s => {
                const sRating = s.getAttribute('data-rating');
                s.classList.remove('highlight');
                if (sRating <= rating) {
                    s.classList.add('highlight');
                }
            });
        });
    });
        });
    });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const reviewItems = document.querySelectorAll('.review-item');

            reviewItems.forEach(item => {
                item.addEventListener('click', function () {
                    reviewItems.forEach(i => i.classList.add('hidden'));
                    this.classList.remove('hidden');

                    const details = this.querySelector('.additional-details');
                    if (details) {
                        details.classList.remove('hidden');
                    }
                });
            });


        });
    </script>





