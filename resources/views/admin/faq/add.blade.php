@extends('layouts.master')
@section('title')
FAQ Add
@endsection

@section('content')
@component('common-components.breadcrumb')
@slot('pagetitle')   Add @endslot
@slot('title') FAQ @endslot
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

                            <form action="{{ $url }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class=" form-label">Category</label>
                                            <select class="form-select" name="category" id="category">
                                                <option value="">Select</option>
                                                @foreach($category as $cat)
                                                    <option value="{{ $cat->id }}"
                                                        @if(isset($faq) && $faq && $cat->id == $faq->category)
                                                            selected
                                                        @endif
                                                    >{{ $cat->category_name }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('category'))
                                                <span class="text-danger">{{ $errors->first('category') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="formrow-password-input">Question</label>
                                            <input type="text" class="form-control" name="question" id="question" placeholder="Enter your question" value="@if(isset($faq->question)){{ $faq->question }}@else{{ old('question')}}@endif">
                                            @if ($errors->has('question'))
                                                <span class="text-danger">{{ $errors->first('question') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="formrow-password-input">Answer</label>
                                            <input type="text" class="form-control" name="answer" id="answer" placeholder="Enter your answer" value="@if(isset($faq->answer)){{ $faq->answer }}@else{{ old('answer')}}@endif">
                                            @if ($errors->has('answer'))
                                                <span class="text-danger">{{ $errors->first('answer') }}</span>
                                            @endif
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
