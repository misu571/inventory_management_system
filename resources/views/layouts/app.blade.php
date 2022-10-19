<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('deskapp/vendors/images/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('deskapp/vendors/images/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('deskapp/vendors/images/favicon-16x16.png') }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('deskapp/vendors/styles/core.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('deskapp/vendors/styles/icon-font.min.css') }}">
    @yield('deskapp_styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('deskapp/vendors/styles/style.css') }}">
</head>
<body class="@auth header-dark sidebar-light @else login-page @endauth" cz-shortcut-listen="true">
    @auth
        <!-- Application header -->
        @include('layouts.header')

        <!-- Application sidebar -->
        @include('layouts.sidebar')

        <!-- Application body content -->
        <div class="main-container">
            <div class="my-2 mx-1">
                <div class="mb-30" style="min-height:82vh">
                    @yield('content')
                </div>
                <div class="footer-wrap py-2 px-3 card-box">
                    <div class="d-flex justify-content-between">
                        <div><i class="icon-copy fa fa-copyright" aria-hidden="true"></i> {{ now()->year }} {{ config('app.company') }}</div>
                        <div>v {{ config('app.version') }}</div>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Session alert -->
        @include('layouts.alert')
    @else
        <!-- Application login header -->
        @include('layouts.login_header')
        
        @yield('content')
    @endauth
    <!-- js -->
    <script src="{{ asset('deskapp/vendors/scripts/core.js') }}"></script>
    <script src="{{ asset('deskapp/vendors/scripts/script.min.js') }}"></script>
    <script src="{{ asset('deskapp/vendors/scripts/process.js') }}"></script>
    <script src="{{ asset('deskapp/vendors/scripts/layout-settings.js') }}"></script>
    <!-- page js -->
    @yield('deskapp_scripts')
    <!-- app js -->
    <script>
        // Session alert message
        $(document).ready(function(){$('.toast').toast('show')})
    </script>
</body>
</html>
