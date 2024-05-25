@extends('public.layouts.master')

@section('content')
<section class="infomation-user" id="infomation_user">
    @include('public.layouts.breadcrums', [
    'breadcrums' => [['label' => trans('Thông tin tài khoản')]],
    ])
    <div class="container py-3">
        <div class="infomation-products row flex-row p-0 my-3">
            <div class="col-lg-3 col-12">
                @include('public.auth.include.sidebar')

            </div>
            <div class="col-lg-9 col-12">
                @include('public.auth.pages.information.include.content')
            </div>
        </div>
    </div>
</section>
@endsection