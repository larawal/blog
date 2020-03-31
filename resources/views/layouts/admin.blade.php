<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        <script src="{{ asset('admin/js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('admin/css/app.css') }}" rel="stylesheet">
    </head>
    <body class="sb-nav-fixed">
        <div id="app">
            @include('admin.includes.nav')
            <div id="layoutSidenav">
                @include('admin.includes.side')
                <div id="layoutSidenav_content">
                    <main>
                        <div class="container-fluid">
                            @yield('content')
                        </div>
                    </main>
                    @include('admin.includes.footer')
                </div>
            </div>
        </div>
        <script>
            var ABSOLUTE_ADMIN_URL = "{{Request::root()}}/admin/";
        </script>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <script src="{{asset('admin/js/main.js')}}"></script>
        @stack('scripts')
    </body>
</html>
