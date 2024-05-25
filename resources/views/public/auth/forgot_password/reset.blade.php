@extends('public.layouts.master')

@section('content')
    <div class="page page-center">
        <div class="container-tight py-4">
            <x-form :action="route('reset_password.update')" class="card card-md" type="put" :validate="true">
                <x-input type="hidden" name="token" :value="$token" />
                <x-input type="hidden" name="code" :value="$code" />
                <div class="card-body">
                    <h2 class="card-title text-center mb-4">{{ __('Nhập mật khẩu mới') }}</h2>
                    <div class="mb-3">
                        <label class="form-label">{{ __('Mật khẩu mới') }}</label>
                        <x-input-password name="password" :required="true" :placeholder="__('Mật khẩu mới')" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{ __('Nhập lại mật khẩu') }}</label>
                        <x-input-password name="password_confirmation" :required="true" :placeholder="__('Nhập lại mật khẩu')"
                            data-parsley-equalto="input[name='password']"
                            data-parsley-equalto-message="{{ __('Mật khẩu không khớp.') }}" />
                    </div>
                    <div class="form-footer">
                        <button type="submit" class="btn btn-cyan w-100">{{ __('Lấy lại mật khẩu') }}</button>
                    </div>
                </div>
            </x-form>
            <div class="text-center text-muted mt-3">
                <a href="{{ route('home.index') }}" class="text-cyan text-decoration-none">@lang('Trở về trang chủ')</a>
            </div>
        </div>
    </div>
@endsection
