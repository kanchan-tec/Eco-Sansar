@extends('layouts.master')
@section('title')
Change Password
@endsection

@section('content')
@component('common-components.breadcrumb')
@slot('pagetitle')   Password @endslot
@slot('title') Change  @endslot
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



                            <form class="needs-validation" novalidate action="" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="formrow-password-input">Current password</label>
                                            <input  type="password" class="form-control" name="password" id="password"   value="{{ isset($user) ? '' : old('password') }}">

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="formrow-password-input">New password</label>
                                            <input  type="password" class="form-control" name="new_password" id="new_password"   value="{{ isset($user) ? '' : old('password') }}">

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="formrow-password-input">Confirm password</label>
                                            <input  type="password" class="form-control" name="confirm_password" id="confirm_password"   value="{{ isset($user) ? '' : old('password') }}">

                                        </div>
                                    </div>
                                    {{--  <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="formrow-password-input">Password</label>
                                            <input  type="password" class="form-control" name="password" id="password"   value="{{ isset($user) ? '' : old('password') }}">

                                        </div>
                                    </div>  --}}
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
