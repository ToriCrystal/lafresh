@extends('public.layouts.master')



@section('content')
<div class="container my-3 py-3">
    <div class="hr-text">
        <h2 class="text-uppercase fw-bold title-section py-3 text-dark bg-transparent">Đặt số lượng lớn</h2>
    </div>
    <div class="row align-items-start justify-content-evenly">
        <div class="col-md-6 col-12">
            @include('public.wholesale.include.table')
        </div>
        <div class="col-md-4 col-12">
            @include('public.wholesale.include.cart')

        </div>
    </div>

</div>
@endsection