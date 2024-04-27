@extends('layouts.master')
@section('title')
Profile Edit
@endsection

@section('content')
@component('common-components.breadcrumb')
@slot('pagetitle')   Edit @endslot
@slot('title') Profile @endslot
@endcomponent

<div class="row justify-content-center align-items-center">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                {{--  <h4 class="card-title">Form layouts</h4>  --}}
                <div class="row ">
                    <div class="col-lg-12">
                        <div class="mt-4">
                            {{--  <h5 class="font-size-14 mb-4"><i class="mdi mdi-arrow-right text-primary me-1"></i> Form groups</h5>  --}}



                            <form class="needs-validation" novalidate action="{{ $url }}" method="POST">
                                @csrf
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="formrow-password-input">Name</label>
                                            <input required type="text" class="form-control" name="name" id="name"   value="@if(isset($user->name)){{ $user->name }}@else{{ old('name')}}@endif">
                                           <div class="invalid-feedback">
                                                Please provide question.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="formrow-password-input">Phone Number</label>
                                            <input required type="text" class="form-control" name="phone_no" id="phone_no"   value="@if(isset($user->phone_no)){{ $user->phone_no }}@else{{ old('phone_no')}}@endif">
                                           <div class="invalid-feedback">
                                                Please provide answer.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="formrow-password-input">Email</label>
                                            <input required type="email" class="form-control" name="email" id="email"   value="@if(isset($user->email)){{ $user->email }}@else{{ old('email')}}@endif">
                                           <div class="invalid-feedback">
                                                Please provide answer.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="mb-3">
                                            <button class="btn btn-primary" type="submit">Submit</button>
                                            <a href="{{route('faq.list')}}" class="btn btn-primary">Cancel</a>
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
