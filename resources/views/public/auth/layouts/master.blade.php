@extends('public.layouts.master')

@section('content')
    <section class="infomation-user" id="infomation_user">
        @include('public.layouts.breadcrums', [
            'breadcrums' => $breadcrums ?? [['label' => trans('Thông tin tài khoản')]],
        ])
        <div class="container py-3 p-3">
            <div class="row flex-row p-0 my-3 card">
                <div class="col-md-3 col-12 p-0">
                    @include('public.auth.include.sidebar')
                </div>
                <div class="col-md-9 col-12 p-3">
                    @yield('content_auth')
                </div>
            </div>
        </div>
    </section>
@endsection

@push('custom-js')
    <script>
        var currentLocation = window.location.href; // Lấy đường dẫn của trang hiện tại
        // Duyệt qua từng phần tử li trong menu
        $("ul.nav.nav-tabs li").each(function() {
            var menuItem = $(this);
            var menuLink = menuItem.find("a");
            $(menuLink).each(function() {
                var linkLocation = $(this).attr('href');
                // So sánh đường dẫn của menu item với đường dẫn của trang hiện tại
                if (linkLocation === currentLocation) {
                    $(this).addClass('active');
                }
            });
        });
    </script>
@endpush
