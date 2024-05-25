@extends('public.layouts.master')

@section('content')
<section class="infomation-user" id="infomation_user">
    @include('public.layouts.breadcrums', [
    'breadcrums' => [['label' => trans('Danh sách đơn hàng')]],
    ])
    <div class="container py-3">
        <div class="infomation-products container row flex-row p-0 my-3">
            <div class="col-lg-3 col-12">
                @include('public.auth.include.sidebar')

            </div>
            <div class="col-lg-9 col-12">
                @include('public.auth.pages.orders.include.items')
            </div>
        </div>
    </div>
</section>
@endsection