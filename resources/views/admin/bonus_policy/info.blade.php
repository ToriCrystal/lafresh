@extends('admin.layouts.master')

@push('libs-css')
    <style>
        .hr-right{
            border-right: 1px solid #e6e7e9;
        }
    </style>
@endpush
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
                            <li class="breadcrumb-item active" aria-current="page">
                                {{ __('Chính sách thưởng doanh số đại lý') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-header justify-content-between">
                    <h2 class="mb-0">{{ __('Chính sách thưởng doanh số đại lý') }}</h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 mb-3 hr-right">
                            @include('admin.bonus_policy.partials.pail', ['bonus_policy_pail' => $bonus_policy_pail])
                        </div>
                        <div class="col-sm-12 col-md-6">
                            @include('admin.bonus_policy.partials.bottle', ['bonus_policy_bottle' => $bonus_policy_bottle])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('libs-js')
@endpush

@push('custom-js')
    @include('admin.bonus_policy.script.script')
@endpush
