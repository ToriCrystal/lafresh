@extends('public.layouts.master')

@section('content')
    <section class="infomation-user" id="infomation_user">
        @include('public.layouts.breadcrums', [
            'breadcrums' => [
                ['label' => trans('Quản lý nhân viên'), 'url' => route('profile.employee')],
                ['label' => trans('Chỉnh sửa')],
            ],
        ])
        <div class="container py-3">
            <div class="infomation-products container row flex-row p-0 my-3">
                <div class="col-lg-3 col-12">
                    @include('public.auth.include.sidebar')

                </div>
                <div class="col-lg-9 col-12">
                    @include('public.auth.pages.employee.include.edit')
                </div>
            </div>
        </div>
    </section>
@endsection
