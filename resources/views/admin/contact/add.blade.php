@extends('layouts.master')
@section('title')
Contact Add
@endsection

@section('content')
@component('common-components.breadcrumb')
@slot('pagetitle')   Add @endslot
@slot('title') Contact @endslot
@endcomponent

@include('sweetalert::alert')
<div class="row justify-content-center align-items-center">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                {{--  <h4 class="card-title">Form layouts</h4>  --}}
                <div class="row ">
                    <div class="col-lg-12">
                        <div class="mt-4">
                            {{--  <h5 class="font-size-14 mb-4"><i class="mdi mdi-arrow-right text-primary me-1"></i> Form groups</h5>  --}}

                            <form action="{{ $url }}" Method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="email">Email</label>
                                            <input type="text" class="form-control" value="@if (isset($contact->email)) {{ $contact->email }} @endif" name="email" id="email" placeholder="Enter your Email">
                                            @if ($errors->has('email'))
                                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="mobile">Mobile</label>
                                            <input type="text" class="form-control" value="@if (isset($contact->mobile)) {{ $contact->mobile }} @endif" name="mobile" id="mobile" placeholder="Enter your Mobile">
                                            @if ($errors->has('mobile'))
                                                <span class="text-danger">{{ $errors->first('mobile') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Address</label>
                                              <div>
                                                  <textarea class="form-control" name="address" id="address" rows="5">@if (isset($contact->address)) {{ $contact->address }} @endif</textarea>
                                              </div>
                                              @if ($errors->has('address'))
                                                <span class="text-danger">{{ $errors->first('address') }}</span>
                                              @endif
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Google Map</label>
                                              <div>
                                                  <textarea  class="form-control" name="map" id="map" rows="5">@if (isset($contact->map)) {{ $contact->map }} @endif</textarea>
                                              </div>
                                              @if ($errors->has('map'))
                                                <span class="text-danger">{{ $errors->first('map') }}</span>
                                             @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <button class="btn btn-primary" type="submit">Submit</button>
                                            <a href="{{route('contact.list')}}" class="btn btn-danger">Cancel</a>
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
@endsection

@section('script')
    <script src="{{ URL::asset('/assets/libs/parsleyjs/parsleyjs.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/form-validation.init.js') }}"></script>
@endsection
