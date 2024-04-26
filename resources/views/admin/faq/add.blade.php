@extends('layouts.master')
@section('title')
@lang('translation.Basic_Elements')
@endsection

@section('content')
@component('common-components.breadcrumb')
@slot('pagetitle')   Add @endslot
@slot('title') FAQ Add @endslot
@endcomponent

<div class="row justify-content-center align-items-center">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                {{--  <h4 class="card-title">Form layouts</h4>  --}}
                <div class="row ">
                    <div class="col-lg-5">
                        <div class="mt-4">
                            {{--  <h5 class="font-size-14 mb-4"><i class="mdi mdi-arrow-right text-primary me-1"></i> Form groups</h5>  --}}
                            <form action="{{ route('faq.save') }} " method="POST">
                                <div class="mb-3">
                                    <label class="form-label" for="formrow-Fullname-input">Category</label>
                                    <input type="text" class="form-control" id="formrow-Fullname-input" placeholder="Enter your full Name">
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="formrow-email-input">Question</label>
                                            <input type="text" class="form-control" name="question" id="question" placeholder="Enter your email address">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="formrow-password-input">Answer</label>
                                            <input type="text" class="form-control" name="answer" id="answer" placeholder="Enter your password">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="formrow-customCheck">
                                    <label class="form-check-label" for="formrow-customCheck">Check me out</label>
                                </div>

                                <div class="d-flex flex-wrap gap-3 mt-3">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light w-md">Submit</button>
                                    <button type="reset" class="btn btn-outline-danger waves-effect waves-light w-md">Reset</button>
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
