@extends('layouts.master')
@section('title')
Consumer View
@endsection

@section('content')
@component('common-components.breadcrumb')
@slot('pagetitle')   View @endslot
@slot('title') Consumer @endslot
@endcomponent

<div class="row justify-content-center align-items-center">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                {{--  <h4 class="card-title">Form layouts</h4>  --}}
                <div class="row ">
                    <div class="col-lg-12">
                        <h4 class="card-title">Consumer Details</h4>
                {{--  <p class="card-title-desc">See how aspects of the Bootstrap grid system work across multiple devices with a handy table.</p>  --}}
                <section class="basic-details pt-2 pb-0 px-3" style="border: 1px solid #ccc;border-radius:5px;">
                <div class="row">
                    <div class="col-4">
                        <p class="mb-0"><strong> Name:</strong><br>
                        <p>@isset($users->name){{ $users->name }}@endisset</p>
                    </div>
                    <div class="col-4">
                        <p class="mb-0"><strong> Phone:</strong><br>
                        <p>@isset($users->mobile){{ $users->mobile }}@endisset</p>
                    </div>
                    <div class="col-4">
                        <p class="mb-0"><strong>Address:</strong><br>
                        <p>@isset($users->address){{ $users->address }}@endisset</p>
                    </div>
                    <div class="col-4">
                        <p class="mb-0"><strong>Pincode:</strong><br>
                        <p>@isset($users->pincode){{ $users->pincode }}@endisset</p>
                    </div>
                    <div class="col-4">
                        <p class="mb-0"><strong>Type of residences :</strong><br>
                        <p>@isset($users->type_of_residences){{ $users->type_of_residences }}@endisset</p>
                    </div>

                    <div class="col-4">
                        <p class="mb-0"><strong>Email:</strong><br>
                        <p>@isset($users->email){{ $users->eamil }}@endisset</p>
                    </div>

                </div>
                </section>
                <div class="mt-3  text-center">
                    <a href="{{ route('user.consumerlist') }}" class="btn btn-primary waves-effect waves-light" >Back</a>
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
