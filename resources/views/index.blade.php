@extends('layouts.master')
@section('title')
    {{ __('Dashboard') }}
@endsection
@section('content')

    <x-page-title title="Ecommerce" pagetitle="Dashboards" />

    <textarea name="tinyeditor" id="tinyeditor" cols="30" rows="10"></textarea>
    
@endsection
@push('scripts')
    <!-- App js -->
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endpush
