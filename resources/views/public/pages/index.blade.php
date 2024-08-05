@extends('public.layouts.master')

@section('content')
    @include('public.layouts.breadcrums', [
        'breadcrums' => [['label' => $page->first()->slug]],
    ])
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-9 col-12">
                <h1 class="title-section mb-3" style="font-size: 2em">{{ $page->first()->name }}</h1>
                <div class="content">
                    {!! $page->first()->content !!}
                </div>
            </div>
        </div>
    </div>
@endsection
