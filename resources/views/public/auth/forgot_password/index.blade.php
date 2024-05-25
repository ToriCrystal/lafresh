@extends('public.layouts.master')

@section('content')
    <div class="page page-center">
        <div class="container container-tight py-4">
            <x-form class="card card-md" :action="route('reset_password.handle')" type="post" :validate="true">
                <div class="card-body">
                    <h2 class="card-title text-center mb-4 text-uppercase">@lang('Khôi phục mật khẩu')</h2>
                    <div class="mb-3">
                        <label class="form-label">@lang('Email đăng ký')</label>
                        <x-input-email name="email" :required="true" :placeholder="trans('Nhập email đăng ký')" />
                    </div>
                    <div class="form-footer">
                        <x-button type="submit" class="btn-cyan w-100">
                            <!-- Download SVG icon from http://tabler-icons.io/i/mail -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z">
                                </path>
                                <path d="M3 7l9 6l9 -6"></path>
                            </svg>
                            @lang('Gửi mã xác thực')
                        </x-button>
                    </div>
                </div>
            </x-form>
            <div class="text-center text-muted mt-3">
                <a href="{{ route('home.index') }}" class="text-cyan text-decoration-none">@lang('Trở về trang chủ')</a>
            </div>
        </div>
    </div>
@endsection
