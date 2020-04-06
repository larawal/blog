<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Larawal') }}</title>

        <!-- Favico -->
        <link rel="shortcut icon" href="{{asset('admin/img/logo/favicon.ico')}}"> 

        <!-- Theme CSS -->
        <link href="{{asset('admin/css/vendors.bundle.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('admin/css/style.bundle.css')}}" rel="stylesheet" type="text/css">

        <!--begin::Web font -->
        <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
        <script>
            WebFont.load({
                google: {"families":["Montserrat:300,400,500,600,700","Roboto:300,400,500,600,700"]},
                active: function() {
                    sessionStorage.fonts = true;
                }
            });
        </script>
    </head>

	<body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
		<div class="m-grid m-grid--hor m-grid--root m-page">
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--signin m-login--2 m-login-2--skin-3" id="m_login" style="background-image: url({{asset('admin/img/auth.jpg')}});">
				<div class="m-grid__item m-grid__item--fluid m-login__wrapper">
					<div class="m-login__container">
						<div class="m-login__logo">
							<a href="{{url('/')}}">
								<img src="{{asset('admin/img/logo/logo.png')}}">
							</a>
                        </div>
                        @yield('content')
					</div>
				</div>
			</div>
		</div>  
        <script src="{{asset('admin/js/vendors.bundle.js')}}" type="text/javascript"></script>
        <script src="{{asset('admin/js/scripts.bundle.js')}}" type="text/javascript"></script>
	</body>
</html>