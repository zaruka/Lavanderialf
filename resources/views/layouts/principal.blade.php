<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Simulacion Montecarlo sobre lineas de espera e inventarios">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<link rel="shortcut icon" href="{{ asset('imagenes/ico_pestan.png') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/cs-skin-elastic.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/scss/style.css') }}">
    <link href="{{ asset('assets/css/lib/vector-map/jqvmap.min.css') }}" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <link href="{{ asset('css/fontawesome-free-5.0.6/web-fonts-with-css/css/fontawesome-all.min.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('bootstrap/bootstrap.min.css') }}">
	{{-- TITULO --}}
	<title>
		@yield('titulo', 'TS_8A_2017_2_PILAY_PICO')
	</title>
	{{-- FIN TITULO --}}

	{{-- ESTILOS --}}
	@yield('estilos')
	{{-- FIN ESTILOS --}}
</head>
<body>
	{{-- MENU --}}
	@yield('menu')
	{{-- FIN MENU --}}

	{{-- CABECERA --}}
	{{-- @yield('cabecera') --}}
	@include('cabecera.cabecera')
	{{-- FIN CABECERA --}}


	{{-- CONTENIDO CENTRAL --}}
	{{-- @yield('contenido') --}}
	{{-- FIN CONTENIDO --}}

	{{-- PIE DE PAGINA --}}
	@yield('pie')
	{{-- FIN PIE DE PAGINA --}}

	{{-- SCRIPT JS --}}
	<script src="{{ asset('assets/js/vendor/jquery-2.1.4.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="{{ asset('assets/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>


    <script src="{{ asset('assets/js/lib/chart-js/Chart.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
    <script src="{{ asset('assets/js/widgets.js') }}"></script>
    <script src="{{ asset('assets/js/lib/vector-map/jquery.vmap.js') }}"></script>
    <script src="{{ asset('assets/js/lib/vector-map/jquery.vmap.min.js') }}"></script>
    <script src="{{ ('assets/js/lib/vector-map/jquery.vmap.sampledata.js') }}"></script>
    <script src="{{ asset('assets/js/lib/vector-map/country/jquery.vmap.world.js') }}"></script>
	@yield('script')
	{{-- FIN SCRIPT JS --}}
</body>
</html>