@extends('public.auth.layouts.master')

@section('content_auth')
    <div class="card-header border-bottom mb-3">
        <h2 class="fw-bold">@lang('Đổi mật khẩu')</h2>
    </div>

    <x-form :action="route('security.handle_change_password')" type="put" :validate="true">
        <div class="card-body">
            <div class="mb-3 row">
                <label class="col-md-3 col-12 col-form-label required">@lang('Mật khẩu cũ')</label>
                <div class="col">
                    <x-input-password name="old_password" :required="true" :placeholder="__('Mật khẩu cũ')" />
                </div>
            </div>

            <div class="mb-3 row">
                <label class="col-md-3 col-12 col-form-label required">@lang('Mật khẩu mới')</label>
                <div class="col">
                    <x-input-password name="password" :required="true" :placeholder="__('Mật khẩu mới')" />
                </div>
            </div>

            <div class="mb-3 row">
                <label class="col-md-3 col-12 col-form-label required">@lang('Nhập lại mật khẩu mới')</label>
                <div class="col">
                    <x-input-password name="password_confirmation" :required="true" :placeholder="__('Nhập lại mật khẩu')"
                        data-parsley-equalto="input[name='password']"
                        data-parsley-equalto-message="{{ __('Mật khẩu không khớp.') }}" />
                </div>
            </div>
        </div>
        <x-button type="submit" class="ms-auto btn-cyan mt-3">@lang('Lưu thay đổi')</x-button>
    </x-form>
@endsection
