@extends('public.layouts.master')

@section('content')
    <div class="page page-center">
        <div class="container container-tight py-4">
            <form class="card card-md" action="./" method="get" autocomplete="off" novalidate="">
                <div class="card-body">
                    <h2 class="card-title text-center mb-4 text-uppercase">@lang('Khôi phục mật khẩu')</h2>
                    </p>
                    <div class="mb-3">
                        <p class="text-center text-danger fw-bold">@lang('Vui lòng kiểm tra email để khôi phục mật khẩu.')</p>
                    </div>
                </div>
            </form>
            <div class="text-center text-muted mt-3">
                <a href="{{ route('home.index') }}" class="text-cyan text-decoration-none">@lang('Trở về trang chủ')</a>
            </div>
        </div>
    </div>
@endsection
