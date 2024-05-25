@extends('public.layouts.master')

@section('content')
@include('public.layouts.breadcrums', [
'breadcrums' => [['label' => $page->slug]],
])
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-9 col-12">
            <h1 class="title-section mb-3" style="font-size: 2em">{{$page->name}}</h1>
            <div class="content">
                {!!$page->content!!}
            </div>
        </div>
    </div>
</div>
@endsection