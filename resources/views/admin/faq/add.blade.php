@extends('layouts.master')
@section('title')
FAQ Add
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
                    <div class="col-lg-12">
                        <div class="mt-4">
                            {{--  <h5 class="font-size-14 mb-4"><i class="mdi mdi-arrow-right text-primary me-1"></i> Form groups</h5>  --}}



                            <form class="needs-validation" novalidate>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class=" form-label">Category</label>
                                            <select class="form-select" name="category" id="category" required>
                                                <option value="">Select</option>
                                                <option value="General Inquiry">General Inquiry</option>
                                                <option value="Technical Support">Technical Support</option>
                                            </select>
                                            <div class="invalid-feedback">
                                               Please select category
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="formrow-password-input">Question</label>
                                            <input required type="text" class="form-control" name="question" id="question" placeholder="Enter your question">
                                           <div class="invalid-feedback">
                                                Please provide question.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="formrow-password-input">Answer</label>
                                            <input required type="text" class="form-control" name="answer" id="answer" placeholder="Enter your answer">
                                           <div class="invalid-feedback">
                                                Please provide answer.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <button class="btn btn-primary" type="submit">Submit form</button>
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
