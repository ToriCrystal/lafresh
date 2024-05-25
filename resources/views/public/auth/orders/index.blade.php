@extends('public.auth.layouts.master')

@section('content_auth')
<div class="information-orders">
    <div class="card-header mb-3">
        <ul class="nav nav-tabs card-header-tabs nav-fill nav-order-status" data-bs-toggle="tabs" role="tablist">
            <li class="nav-item" role="presentation">
                <a href="{{ route('order.index') }}" class="nav-link active">
                    @lang('Tất cả đơn')
                </a>
            </li>
            @foreach ($status as $key => $value)
                <li class="nav-item" role="presentation">
                    <a href="{{ route('order.index', ['status' =>$key]) }}" 
                        class="nav-link" 
                    >
                        {{ $value }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="mb-3">
        <div class="input-icon mb-3">
            <x-input :placeholder="trans('Tìm kiếm đơn hàng...')" />
            <span class="input-icon-addon">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                    stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
                    <path d="M21 21l-6 -6"></path>
                </svg>
            </span>
        </div>
    </div>
    <div class="card-body">
        <div id="orderList" class="">
            @forelse ($orders as $order)
                @include('public.auth.orders.partials.item')
            @empty
                @include('public.partials.no-record')
            @endforelse
        </div>
        <div id="loading" class="align-items-center justify-content-center py-4 my-3 text-center" style="display: none">
            <span class="spinner-grow spinner-grow-sm text-color-primary" role="status" aria-hidden="true"></span>
            <span class="fw-lighter">{{ $text ?? __('Đang tải...') }}</span>
        </div>
        <div id="paginateLoading" class="wrap-loading text-center" style="display: none">
            <span class="spinner-grow spinner-grow-sm text-color-primary" role="status" aria-hidden="true"></span>
            <span class="fw-lighter">{{ $text ?? __('Đang tải...') }}</span>
        </div>
    </div>
</div>

@endsection


@push('custom-js')
@include('public.auth.orders.scripts.script')
@endpush
