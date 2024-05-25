@extends('public.auth.layouts.master')

@section('content_auth')
<div class="card-header border-bottom mb-3">
    <h2 class="fw-bold">
        @lang('Thông tin nhân viên')
    </h2>
</div>

<x-form :action="route('manager_employee.update')" type="put" :validate="true">
    <x-input type="hidden" name="id" :value="$employee->id" />
    <div class="card-body row align-items-center">
        <div class="col-lg-6 col-12">
            <div class="mb-3">
                <label class="form-label required">@lang('fullname')</label>
                <x-input type="fullname" class="shadow-none" name="fullname" :value="$employee->fullname"
                    :placeholder="trans('Nhập họ và tên')" :required="true" />
            </div>
        </div>

        <div class="col-lg-6 col-12">
            <div class="mb-3">
                <label class="form-label required">@lang('email')</label>
                <x-input-email class="shadow-none" name="email" :value="$employee->email" :required="true" :placeholder="trans('Địa chỉ email')" />
            </div>
        </div>
        <div class="col-lg-6 col-12">
            <div class="mb-3">
                <label class="form-label required">@lang('phone')</label>
                <x-input-phone class="shadow-none" name="phone" :value="$employee->phone" :required="true" :placeholder="trans('Số điện thoại')" />
            </div>
        </div>

        <div class="col-lg-6 col-12">
            <div class="mb-3">
                <label class="form-label required">@lang('gender')</label>
                <x-select name="gender" class="shadow-none" :required="true">
                    @foreach ($gender as $key => $value)
                        <x-select-option :option="$employee->status->value" :value="$key" :title="$value" />
                    @endforeach
                </x-select>
            </div>
        </div>
        <div class="col-lg-6 col-12">
            <div class="mb-3">
                <label class="form-label required">@lang('birthday')</label>
                <x-input type="date" class="shadow-none" name="birthday" :value="$employee->birthday" />
            </div>
        </div>

        <div class="col-lg-6 col-12">
            <div class="mb-3">
                <label class="form-label">@lang('address')</label>
                <x-input class="shadow-none" name="address" :value="$employee->address" :placeholder="trans('address')" />
            </div>
        </div>
        <div class="col-lg-6 col-12">
            <div class="mb-3">
                <label class="form-label required">@lang('password')</label>
                <x-input-password name="password" autocomplete="off" :required="true" />
            </div>
        </div>
        <div class="col-lg-6 col-12">
            <div class="mb-3">
                <label class="form-label required">@lang('Nhập lại mật khẩu')</label>
                <x-input-password name="password_confirmation" autocomplete="off" :required="true" 
                    data-parsley-equalto="input[name='password']" 
                    data-parsley-equalto-message="{{ __('Mật khẩu không khớp.') }}" 
                    :placeholder="trans('Nhập lại mật khẩu')" />
            </div>
        </div>
    </div>
    <x-button type="submit" class="ms-auto btn-cyan mt-3">@lang('edit')</x-button>
</x-form>
@endsection
