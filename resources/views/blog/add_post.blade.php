@extends('layouts.master')
@section('title')
    Blog
@endsection
@section('content')

    <x-page-title title="Novo Post" pagetitle="Blog" />

    Novo Post
    
@endsection
@push('scripts')
    <!-- App js -->
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endpush
