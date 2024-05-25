<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', $settings['site_name'])</title>
    <link rel="shortcut icon" href="{{ asset(config('custom.images.favicon')) }}" type="image/x-icon" />

    <link rel="stylesheet" href="{{ asset('public/libs/tabler/dist/css/tabler.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/libs/fontawesome6/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/assets/css/jquery-ui.1.12.1.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="{{ asset('public/libs/jquery-toast-plugin/jquery.toast.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('public/libs/Parsley.js-2.9.2/style.css') }}" rel="stylesheet">
    <link href="{{ asset('public/libs/fancybox/css/fancybox.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('libs/owlcarousel/css/owl.carousel.min.css') }}">

    @stack('lib-css')



    <link rel="stylesheet" href="{{ asset('public/assets/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/infomation-user.css') }}">

    {{-- <style>
    header.header-main {
        background-color: {{ $settings['bg_color_header'] }};
    }

    main {
        background-color: {{ $settings['bg_color_main'] }};
    }

    footer {
        background-color: {{ $settings['bg_color_footer'] }};
    }
    </style> --}}

    @stack('custom-css')
</head>
