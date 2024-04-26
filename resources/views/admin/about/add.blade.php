@extends('layouts.master')
@section('title')
    @lang('translation.Form_editor')
@endsection

@section('content')
    @component('common-components.breadcrumb')
        @slot('pagetitle') Forms @endslot
        @slot('title') Form editor @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                  
                    <p class="card-title-desc">Example of Ckeditor Classic editor</p>
                    <div id="classic-editor"></div>
                </div>
            </div>
        </div>
    </div>
    @endsection
@section('script')
    <script src="{{ URL::asset('/assets/libs/ckeditor/ckeditor.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/form-editor.init.js') }}"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#classic-editor'))
            .catch(error => {
                console.error(error);
            });

    </script>
@endsection
