<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Larawal') }}</title>

        <!-- Scripts -->
        <script src="{{ asset('website/js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('website/css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('website/css/font-awesome.min.css') }}" rel="stylesheet">
        <link href="{{ asset('website/css/animate.min.css') }}" rel="stylesheet">
        <link href="{{ asset('website/css/linearicons.min.css') }}" rel="stylesheet">
        <link href="{{ asset('website/css/owl.carousel.min.css') }}" rel="stylesheet">
        <link href="{{ asset('website/css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('website/css/style.css') }}" rel="stylesheet">
    </head>
    <body>
      
       @include('website.includes.header')
       <main>
          @yield('content')
       </main>
       @include('website.includes.footer')

        <!-- Scripts -->
       <script src="{{ asset('website/js/jquery.min.js') }}" defer></script>
       <script src="{{ asset('website/js/owl.carousel.min.js') }}" defer></script>
       <script src="{{ asset('website/js/easing.min.js') }}" defer></script>
       <script src="{{ asset('website/js/jquery.ajaxchimp.min.js') }}" defer></script>
       <script src="{{ asset('website/js/jquery.tabs.min.js') }}" defer></script>
       <script src="{{ asset('website/js/superfish.min.js') }}" defer></script>
       <script src="{{ asset('website/js/main.min.js') }}" defer></script>
    </body>
</html>
