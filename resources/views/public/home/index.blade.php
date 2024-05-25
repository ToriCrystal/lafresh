@extends('public.layouts.master')

@section('content')
    @include('public.home.partials.splashscreen')
    @include('public.home.partials.slider')

    @include('public.home.partials.gallery')
    @include('public.home.partials.products')
    {{-- @include('public.home.partials.blog') --}}
    @include('public.home.partials.news')
@endsection
