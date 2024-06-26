@extends('layouts.master')
@section('title')
@lang('translation.Shops')
@endsection

@section('content')
@component('common-components.breadcrumb')
@slot('pagetitle') Ecommerce @endslot
@slot('title') Shops @endslot
@endcomponent

<div class="row mb-2">
    <div class="col-md-6">
        <div class="mb-3">
            <a href="javascript:void(0);" class="btn btn-success waves-effect waves-light"><i class="mdi mdi-plus me-2"></i> Add New</a>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-inline float-md-end mb-3">
            <div class="search-box ms-2">
                <div class="position-relative">
                    <input type="text" class="form-control rounded border-0" placeholder="Search...">
                    <i class="mdi mdi-magnify search-icon"></i>
                </div>
            </div>

        </div>
    </div>


</div>
<!-- end row -->

<div class="row">
    <div class="col-xl-4 col-sm-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-start">
                    <div class="flex-shrink-0 me-4">
                        <div class="avatar-sm">
                            <span class="avatar-title bg-primary-subtle text-primary font-size-16 rounded-circle">
                                M
                            </span>
                        </div>
                    </div>
                    <div class="flex-grow-1 align-self-center">
                        <div class="border-bottom pb-1">
                            <h5 class="text-truncate font-size-16 mb-1"><a href="#" class="text-reset">Morrie Mages</a></h5>
                            <p class="text-muted">
                                <i class="mdi mdi-account me-1"></i> Clifton Taylor
                            </p>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="mt-3">
                                    <p class="text-muted mb-2">Products</p>
                                    <h5 class="font-size-16 mb-0">94</h5>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mt-3">
                                    <p class="text-muted mb-2">Wallet Balance</p>
                                    <h5 class="font-size-16 mb-0">$9,852</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="col-xl-4 col-sm-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-start">
                    <div class="flex-shrink-0 me-4">
                        <div class="avatar-sm">
                            <span class="avatar-title bg-warning-subtle text-warning font-size-16 rounded-circle">
                                B
                            </span>
                        </div>
                    </div>

                    <div class="flex-grow-1 align-self-center">
                        <div class="border-bottom pb-1">
                            <h5 class="text-truncate font-size-16 mb-1"><a href="#" class="text-reset">Brendle's</a></h5>
                            <p class="text-muted">
                                <i class="mdi mdi-account me-1"></i> Karl Early
                            </p>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="mt-3">
                                    <p class="text-muted mb-2">Products</p>
                                    <h5 class="font-size-16 mb-0">62</h5>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mt-3">
                                    <p class="text-muted mb-2">Wallet Balance</p>
                                    <h5 class="font-size-16 mb-0">$7,952</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="col-xl-4 col-sm-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-start">
                    <div class="flex-shrink-0 me-4">
                        <div class="avatar-sm">
                            <span class="avatar-title bg-success-subtle text-success font-size-16 rounded-circle">
                                T
                            </span>
                        </div>
                    </div>

                    <div class="flex-grow-1 align-self-center">
                        <div class="border-bottom pb-1">
                            <h5 class="text-truncate font-size-16 mb-1"><a href="#" class="text-reset">Tech Hifi</a></h5>
                            <p class="text-muted">
                                <i class="mdi mdi-account me-1"></i> Marion Glaze
                            </p>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="mt-3">
                                    <p class="text-muted mb-2">Products</p>
                                    <h5 class="font-size-16 mb-0">40</h5>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mt-3">
                                    <p class="text-muted mb-2">Wallet Balance</p>
                                    <h5 class="font-size-16 mb-0">$6,265</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="col-xl-4 col-sm-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-start">
                    <div class="flex-shrink-0 me-4">
                        <div class="avatar-sm">
                            <span class="avatar-title bg-danger-subtle text-danger font-size-16 rounded-circle">
                                L
                            </span>
                        </div>
                    </div>

                    <div class="flex-grow-1 align-self-center">
                        <div class="border-bottom pb-1">
                            <h5 class="text-truncate font-size-16 mb-1"><a href="#" class="text-reset">Lafayette</a></h5>
                            <p class="text-muted">
                                <i class="mdi mdi-account me-1"></i> Brent Johnson
                            </p>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="mt-3">
                                    <p class="text-muted mb-2">Products</p>
                                    <h5 class="font-size-16 mb-0">51</h5>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mt-3">
                                    <p class="text-muted mb-2">Wallet Balance</p>
                                    <h5 class="font-size-16 mb-0">$7,235</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="col-xl-4 col-sm-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-start">
                    <div class="flex-shrink-0 me-4">
                        <div class="avatar-sm">
                            <span class="avatar-title bg-info-subtle text-info font-size-16 rounded-circle">
                                M
                            </span>
                        </div>
                    </div>

                    <div class="flex-grow-1 align-self-center">
                        <div class="border-bottom pb-1">
                            <h5 class="text-truncate font-size-16 mb-1"><a href="#" class="text-reset">Micro Design</a></h5>
                            <p class="text-muted">
                                <i class="mdi mdi-account me-1"></i> Kimberly Martinez
                            </p>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="mt-3">
                                    <p class="text-muted mb-2">Products</p>
                                    <h5 class="font-size-16 mb-0">34</h5>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mt-3">
                                    <p class="text-muted mb-2">Wallet Balance</p>
                                    <h5 class="font-size-16 mb-0">$4,223</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="col-xl-4 col-sm-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-start">
                    <div class="flex-shrink-0 me-4">
                        <div class="avatar-sm">
                            <span class="avatar-title bg-soft-dark text-dark font-size-16 rounded-circle">
                                S
                            </span>
                        </div>
                    </div>

                    <div class="flex-grow-1 align-self-center">
                        <div class="border-bottom pb-1">
                            <h5 class="text-truncate font-size-16 mb-1"><a href="#" class="text-reset">Sportmart</a></h5>
                            <p class="text-muted">
                                <i class="mdi mdi-account me-1"></i> Sarah Stewart
                            </p>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="mt-3">
                                    <p class="text-muted mb-2">Products</p>
                                    <h5 class="font-size-16 mb-0">43</h5>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mt-3">
                                    <p class="text-muted mb-2">Wallet Balance</p>
                                    <h5 class="font-size-16 mb-0">$5,632</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="col-xl-4 col-sm-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-start">
                    <div class="flex-shrink-0 me-4">
                        <div class="avatar-sm">
                            <span class="avatar-title bg-success-subtle text-success font-size-16 rounded-circle">
                                T
                            </span>
                        </div>
                    </div>

                    <div class="flex-grow-1 align-self-center">
                        <div class="border-bottom pb-1">
                            <h5 class="text-truncate font-size-16 mb-1"><a href="#" class="text-reset">Tech Hifi</a></h5>
                            <p class="text-muted">
                                <i class="mdi mdi-account me-1"></i> Lauren Doyle
                            </p>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="mt-3">
                                    <p class="text-muted mb-2">Products</p>
                                    <h5 class="font-size-16 mb-0">40</h5>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mt-3">
                                    <p class="text-muted mb-2">Wallet Balance</p>
                                    <h5 class="font-size-16 mb-0">$5,268</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="col-xl-4 col-sm-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-start">
                    <div class="flex-shrink-0 me-4">
                        <div class="avatar-sm">
                            <span class="avatar-title bg-soft-primary text-primary font-size-16 rounded-circle">
                                B
                            </span>
                        </div>
                    </div>

                    <div class="flex-grow-1 align-self-center">
                        <div class="border-bottom pb-1">
                            <h5 class="text-truncate font-size-16 mb-1"><a href="#" class="text-reset">Brendle's</a></h5>
                            <p class="text-muted">
                                <i class="mdi mdi-account me-1"></i> Elaina Torres
                            </p>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="mt-3">
                                    <p class="text-muted mb-2">Products</p>
                                    <h5 class="font-size-16 mb-0">31</h5>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mt-3">
                                    <p class="text-muted mb-2">Wallet Balance</p>
                                    <h5 class="font-size-16 mb-0">$3,965</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="col-xl-4 col-sm-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-start">
                    <div class="flex-shrink-0 me-4">
                        <div class="avatar-sm">
                            <span class="avatar-title bg-warning-subtle text-warning font-size-16 rounded-circle">
                                S
                            </span>
                        </div>
                    </div>

                    <div class="flex-grow-1 align-self-center">
                        <div class="border-bottom pb-1">
                            <h5 class="text-truncate font-size-16 mb-1"><a href="#" class="text-reset">Standard Sales</a></h5>
                            <p class="text-muted">
                                <i class="mdi mdi-account me-1"></i> Willie Farber
                            </p>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="mt-3">
                                    <p class="text-muted mb-2">Products</p>
                                    <h5 class="font-size-16 mb-0">60</h5>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mt-3">
                                    <p class="text-muted mb-2">Wallet Balance</p>
                                    <h5 class="font-size-16 mb-0">$7,425</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- end row -->

<div class="row">
    <div class="col-xl-12">
        <div class="text-center my-3">
            <a href="javascript:void(0);" class="text-primary"><i class="mdi mdi-loading mdi-spin font-size-20 align-middle me-2"></i> Load more </a>
        </div>
    </div>
</div>
<!-- end row -->
@endsection
