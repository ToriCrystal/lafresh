<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('public.layouts.head')
</head>

<body>

    <div class="page-wrapper">
        @include('public.layouts.header')

        <main>
            @yield('content')
        </main>

        @include('public.layouts.footer')
    </div>



    @include('public.layouts.modals.modal-success-payment')

    @include('public.layouts.modals.modal-cancel-orders')

    @include('admin.layouts.modal.modal-delete')

    @include('public.layouts.modals.modal-search')

    @include('public.layouts.scripts')

    <x-alert />
</body>

</html>
