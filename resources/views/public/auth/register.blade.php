@extends('public.layouts.master')

@section('content')
    <div class="page page-center">
        <div class="container container-tight py-4">
            <x-form class="card card-md" :action="route('register.handle')" type="post" :validate="true">
                <div class="card-body">
                    <h2 class="card-title text-center mb-4 text-uppercase">@lang('Đăng ký tài khoản')</h2>
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="mb-3">
                                <label class="form-label">@lang('Họ và tên')</label>
                                <x-input name="fullname" :required="true" :placeholder="trans('Họ và tên')" :value="old('fullname')" />
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="mb-3">
                                <label class="form-label">@lang('Số điện thoại')</label>
                                <x-input name="phone" :required="true" :placeholder="trans('Số điện thoại')" :value="old('phone')" />
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="mb-3">
                                <label class="form-label">@lang('Ngày sinh')</label>
{{--                                <x-input type="date" name="birthday" autocomplete="off" :required="true"--}}
{{--                                    :value="old('date')" />--}}
                                <x-input type="date" name="birthday" :required="true" />
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="mb-3">
                                <label class="form-label">@lang('Vai trò')</label>
                                <x-select name="roles" :required="true">
                                    <x-select-option value="" :title="__('Chọn vai trò')" />
                                    @foreach ($roles as $key => $value)
                                        <x-select-option :value="$key" :title="__($value)" />
                                    @endforeach
                                </x-select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label">@lang('Email')</label>
                                <x-input-email name="email" :required="true" :placeholder="trans('Email')" :value="old('email')" />
                            </div>
                        </div>



                        <div class="col-md-6 col-12">
                            <div class="mb-3">
                                <label class="form-label">@lang('Mật khẩu')</label>
                                <x-input-password name="password" autocomplete="off" :required="true" />
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="mb-3">
                                <label class="form-label">@lang('Nhập lại mật khẩu')</label>
                                <x-input-password name="password_confirmation" autocomplete="off" :required="true"
                                    data-parsley-equalto="input[name='password']"
                                    data-parsley-equalto-message="{{ __('Mật khẩu không khớp.') }}" :placeholder="trans('Nhập lại mật khẩu')" />
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="mb-3">
                                <x-input-checkbox class="form-check-input" name="agree" :required="true" value="1"
                                    :label="trans('Đồng ý điều khoản bảo mật và chính sách')" />
                            </div>
                        </div>
                    </div>
                    <div class="form-footer">
                        <button type="submit" class="btn btn-cyan w-100">@lang('Đăng ký')</button>
                    </div>
                </div>
            </x-form>
            <div class="text-center text-muted mt-3">
                @lang('Đã có tài khoản?')
                <a href="{{ route('login.index') }}" tabindex="-1"
                    class="text-decoration-none text-cyan">@lang('login')</a>
            </div>
        </div>
    </div>
@endsection
