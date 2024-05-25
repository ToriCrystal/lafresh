@extends('admin.layouts.master')

@push('libs-css')
    <link rel="stylesheet" href="{{ asset('/public/libs/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/public/libs/select2/dist/css/select2-bootstrap-5-theme.min.css') }}">
@endpush
@push('custom-css')
    <style>
        hr {
            margin: 0.5rem !important;
        }

        .navbar-expand-md .nav-item.active {
            position: relative;
        }

        .navbar-expand-md .nav-item.active:after {
            content: "";
            position: absolute;
            left: 0;
            right: 0;
            bottom: 0;
            border: 0 var(--tblr-border-style) var(--tblr-navbar-active-border-color);
            border-bottom-width: 2px;
        }
    </style>
@endpush
@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"
                                    class="text-muted">{{ __('Dashboard') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Chiết khấu') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="">
                <div class="card-header justify-content-between">
                    <h2 class="mb-0">{{ __('Thông tin chiết khấu') }}</h2>
                    <header class="navbar-expand-md">
                        <div class="navbar-collapse" id="navbar-menu" style="">
                            <div class="navbar">
                                <div class="container-xl">
                                    <div class="row flex-fill align-items-center">
                                        <div class="col">
                                            <ul class="navbar-nav">
                                                <li class="nav-item ">
                                                    <a class="nav-link" href="{{ route('admin.discount.agent') }}">
                                                        <span class="nav-link-title">
                                                            <i class="ti ti-user"></i> @lang('Đại lý')
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="nav-item active">
                                                    <a class="nav-link" href="{{ route('admin.discount.seller') }}">
                                                        <span class="nav-link-title">
                                                            <i class="ti ti-user-dollar"></i> @lang('Seller')
                                                        </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </header>
                </div>

                {{-- <div class="card-body">
                    @include('admin.discount.partials.seller', [
                        'seller' => $discount_seller,
                    ])
                </div> --}}
                <div class="page-body">
                    <div class="container-xl">
                        <div class="card">
                            <div class="card-header justify-content-between">
                                <h2 class="mb-0">{{ __('Danh sách') }}</h2>
                                <x-button type="button" data-bs-toggle="modal" data-bs-target="#modal-add-discount-seller"
                                    class="btn btn-primary"><i class="ti ti-plus"></i> @lang('Thêm')</x-button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive position-relative">
                                    <x-admin.partials.toggle-column-datatable />
                                    {{ $dataTable->table(['class' => 'table table-bordered', 'style' => 'min-width: 900px;'], true) }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @include('admin.discount.partials.modal-add-discount-seller')
@endsection

@push('libs-js')
    <!-- button in datatable -->
    <script src="{{ asset('/public/vendor/datatables/buttons.server-side.js') }}"></script>
    <script src="{{ asset('/public/libs/select2/dist/js/select2.min.js') }}"></script>
    <script src="{{ asset('/public/libs/select2/dist/js/i18n/vi.js') }}"></script>
    <script src="{{ asset('/public/libs/jquery-throttle-debounce/jquery.ba-throttle-debounce.min.js') }}"></script>
@endpush
@push('custom-js')
    {{ $dataTable->scripts() }}
    @include('admin.discount.script.datatable')
    @include('admin.discount.script.script')
@endpush
