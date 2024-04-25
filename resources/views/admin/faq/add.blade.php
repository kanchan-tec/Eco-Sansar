@extends('layouts.master')
@section('title')
@lang('translation.Basic_Elements')
@endsection

@section('content')
@component('common-components.breadcrumb')
@slot('pagetitle') Forms @endslot
@slot('title') Basic Elements @endslot
@endcomponent



@endsection
