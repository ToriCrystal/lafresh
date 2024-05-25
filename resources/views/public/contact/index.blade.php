@extends('public.layouts.master')

@section('content')
    @include('public.layouts.breadcrums', [
        'breadcrums' => [['label' => trans('Liên hệ')]],
    ])
    <div class="container">
        <div class="row py-5">
            <div class="col-md-6 col-12">
                @include('public.contact.include.left-content')
            </div>
            <div class="col-md-6 col-12">
                @include('public.contact.include.right-content')
            </div>
        </div>
    </div>
@endsection
