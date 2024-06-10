@include('frontend.include.header')
@include('sweetalert::alert')

<div id="page-content">
    <div class="container">
        <ol class="breadcrumb">
            {{--  <li><a href="#">Home</a></li>
            <li><a href="#">Pages</a></li>
            <li class="active">Contact</li>  --}}
        </ol>
        <section class="page-title pull-left">


        </section>
        <!--end page-title-->
        <a href="#write-a-review" class="btn btn-primary btn-framed btn-rounded btn-light-frame icon scroll pull-right"><i class="fa fa-star"></i>Write a review</a>
    </div>
    <!--end container-->
    <section>
        <div class="gallery detail">
            <div class="owl-carousel" data-owl-items="3" data-owl-loop="1" data-owl-auto-width="1" data-owl-nav="1" data-owl-dots="0" data-owl-margin="2" data-owl-nav-container="#gallery-nav">
                @foreach($buspostsres as $consumerpost)
                <div class="image">
                    <div class="bg-transfer"><img src="{{ asset('frontend/assets/img/Businessposts/'.$consumerpost->resource_img) }}" alt=""></div>
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
                        <dd>{{ $busposts->sale_giveaway }}</dd>
                        <dt>Quantity</dt>
                        <dd>{{ $busposts->min_weight }} {{ $busposts->min_measure }} {{ 'to' }} {{ $busposts->max_weight }} {{ $busposts->max_measure }}</dd>
                        <dt>Sale/Giveaway</dt>
                        <dd>{{ $busposts->clean_unclean }}</dd>
                        <dt>Packaged</dt>
                        <dd>{{ $busposts->packaged }}</dd>
                    </dl>
                </section>
                {{--  <section>
                    <h2>Reviews</h2>
                    <div class="review">
                        <div class="image">
                            <div class="bg-transfer"><img src="assets/img/person-02.jpg" alt=""></div>
                        </div>
                        <div class="description">
                            <figure>
                                <div class="rating-passive" data-rating="4">
                                    <span class="stars"></span>
                                    <span class="reviews">6</span>
                                </div>
                                <span class="date">09.05.2016</span>
                            </figure>
                            <p>Donec nec tristique sapien. Aliquam ante felis, sagittis sodales diam sollicitudin, dapibus semper turpis</p>
                        </div>
                    </div>
                    <!--end review-->
                    <div class="review">
                        <div class="image">
                            <div class="bg-transfer"><img src="assets/img/person-01.jpg" alt=""></div>
                        </div>
                        <div class="description">
                            <figure>
                                <div class="rating-passive" data-rating="5">
                                    <span class="stars"></span>
                                    <span class="reviews">6</span>
                                </div>
                                <span class="date">09.05.2016</span>
                            </figure>
                            <p>Vestibulum vel est massa. Integer pellentesque non augue et accumsan. Maecenas molestie elit nibh,
                                vel vestibulum leo condimentum quis. Duis ac orci a magna auctor vehicula.
                            </p>
                        </div>
                    </div>
                    <!--end review-->
                </section>  --}}
                <section id="write-a-review">
                    <h2>Write a Review</h2>
                    <form class="clearfix form inputs-underline" action="{{ route('review.business_save') }}" method="POST">
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
   <div class="col-md-5 col-sm-5">
                <div class="detail-sidebar">
                    <h2>Enquiry form</h2>
                    <section class="shadow">

                        <!--end map-->
                        <div class="content">
                            <form class="form form-email inputs-underline"  action="{{ route('enquiry.business_save') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $id }}">
                                <div class="row justify-content-center align-items-center">
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label for="name">Name<span style="color:red;">*</span></label>
                                            <input type="text" class="form-control" name="name" id="name">
                                            @if ($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('message') }}</span>
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
                                    <button type="submit" class="btn btn-primary icon shadow">Send Message<i class="fa fa-caret-right"></i></button>
                                </div>
                                <!--end form-group-->
                            </form>
                        </div>
                    </section>

                    {{--  <section>
                        <h2>Share This Listing</h2>
                        <div class="social-share"></div>
                    </section>  --}}
                </div>
                <!--end detail-sidebar-->
            </div>
            <!--end col-md-5-->
        </div>
        <!--end row-->
    </div>
    <!--end container-->
</div>

@include('frontend.include.footer');
