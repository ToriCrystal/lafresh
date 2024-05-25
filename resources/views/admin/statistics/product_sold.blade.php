@extends('admin.layouts.master')
@push('custom-css')

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
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Thống kê sản phẩm đã bán') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">

            <div class="row mt-3">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="mb-0">{{ __('Biểu đồ sản phẩm đã bán') }}</h2>
                        </div>
                        <div class="card-body">
                            <x-form class="row" :action="route('admin.statistic.product_sold')" type="get" :validate="true">
                                <div class="col-md-3 col-sm-6">
                                    <div class="mb-3">
                                        <label class="control-label">{{ __('Ngày bắt đầu') }}:</label>
                                        <x-input type="date" name="start_date" :value="request()->get('start_date')" :required="true" />
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="mb-3">
                                        <label class="control-label">{{ __('Ngày kết thúc') }}:</label>
                                        <x-input type="date" name="end_date" :value="request()->get('end_date')" :required="true" />
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-12">
                                    <x-button.submit style="margin-top: 20px;" :title="__('Lọc')" />
                                </div>
                            </x-form>
                            <canvas id="myChartProductSold" class="w-100" height="350"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('libs-js')
    <!-- chart js -->
    <script src="{{ asset('public/libs/chart.js/chart.umd.js') }}"></script>
@endpush

@push('custom-js')
<x-input id="dataChartProductSold" type="hidden" :value="$chart_product_sold" />
@include('admin.statistics.scripts.script')
    <script>
        const dataChartProductSold = $("#dataChartProductSold").val();
        new Chart(document.getElementById('myChartProductSold'), setConfig(dataChartProductSold, 'sell_date', 'product_qty'));
    </script>
@endpush
