<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Favico -->
        <link rel="shortcut icon" href="{{asset('admin/img/logo/favicon.ico')}}"> 

        <!-- Theme CSS -->
        <link href="{{asset('admin/css/vendors.bundle.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('admin/css/style.bundle.css')}}" rel="stylesheet" type="text/css">

        <!--begin::Web font -->
        <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
        <script>
            var ABSOLUTE_ADMIN_URL = "{{Request::root()}}/admin/";
            WebFont.load({
                google: {"families":["Montserrat:300,400,500,600,700","Roboto:300,400,500,600,700"]},
                active: function() {
                    sessionStorage.fonts = true;
                }
            });
        </script>
    </head>
    <body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
        <!-- begin:: Page -->
        <div class="m-grid m-grid--hor m-grid--root m-page">
            @include('admin.includes.header')
            <!-- begin::Body -->
            <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
                @include('admin.includes.leftbar')
                <div class="m-grid__item m-grid__item--fluid m-wrapper">
                    @yield('content')
                </div>
            </div>
            <!-- end:: Body -->
            {{-- @include('admin.includes.footer') --}}
        </div>
        <!-- end:: Page -->

        @include('admin.includes.rightbar')

        @include('admin.includes.scroll')

        <!--begin::Base Scripts -->        
        <script src="{{asset('admin/js/vendors.bundle.js')}}" type="text/javascript"></script>
        <script src="{{asset('admin/js/scripts.bundle.js')}}" type="text/javascript"></script>
        <!--end::Base Scripts -->

        <script src="{{asset('admin/js/main.js')}}"></script>
        @stack('scripts')
    </body>
</html>
