@extends('public.layouts.master')

@section('content')
    <div class="page page-center">
        <div class="container container-tight py-4">
            <div class="card card-md">
                <div class="card-body">
                    <h2 class="h2 text-center mb-4 text-uppercase fw-bold">@lang('login')</h2>
                    <x-form :action="route('login.handle')" type="post" :validate="true">
                        <div class="mb-3">
                            <label class="form-label">@lang('Số điện thoại')</label>
                            <x-input-phone name="phone" autocomplete="off" :value="old('phone')" :required="true" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">
                                @lang('Mật khẩu')
                                <span class="form-label-description">
                                    <a href="{{ route('reset_password.index') }}" class="text-decoration-none text-cyan">@lang('Quên mật khẩu')</a>
                                </span>
                            </label>
                            <div class="input-group input-group-flat">
                                <x-input-password name="password" autocomplete="off" :required="true" />
                            </div>
                        </div>
                        <div class="form-footer">
                            <x-button type="submit" class="btn-cyan w-100">@lang('login')</x-button>
                        </div>
                    </x-form>
                </div>
            </div>
            <div class="text-center text-muted mt-3">
                @lang('Chưa có tài khoản?') 
                <a href="{{ route('register.index') }}" tabindex="-1" class="text-decoration-none text-cyan">@lang('Đăng ký ngay')</a>
            </div>
        </div>
    </div>
@endsection
