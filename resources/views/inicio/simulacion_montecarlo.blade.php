@extends('layouts.principal')

@section('titulo')
	Montecarlo
@endsection

@section('estilos')
	<link rel="stylesheet" type="text/css" href="{{ asset('js/columns/classic.css') }}">
@endsection

@section('menu')
	@include('menu.menu')
@endsection

@section('cabecera')
	@include('cabecera.cabecera')
@endsection

@section('titulocab')
	Metodo Congruencial Mixto
@endsection

@section('contenido')
	<div class="panel panel-primary">
	  <div class="panel-heading" style="text-align: center;">
	  	<h3>Ingrese los datos para continuar</h3>
	  </div>
	  <div class="panel-body">
	  	<form id="formulario">
		    <div class="row">
				<div class="col-md-5 col-md-offset-1">
					<div class="form-group">
						<label for="xn">Ingrese la semilla (Xn):</label>
						<input type="text" name="xn" id="xn" class="form-control" required placeholder="Ingrese la semilla (Xn)" />
					</div>
				</div>
				<div class="col-md-5 col-md-offset-1">
					<div class="form-group">
						<label for="a">Ingrese el multiplicador (a):</label>
						<input type="text" name="a" id="a" class="form-control" required placeholder="Ingrese el multiplicador (a)" />
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-5 col-md-offset-1">
					<div class="form-group">
						<label for="c">Ingrese el sesgo (c):</label>
						<input type="text" name="c" id="c" class="form-control" required placeholder="Ingrese el sesgo (c)" />
					</div>
				</div>
				<div class="col-md-5 col-md-offset-1">
					<div class="form-group">
						<label for="m">Ingrese el modulo (m):</label>
						<input type="text" name="m" id="m" class="form-control" required placeholder="Ingrese el modulo (m)" />
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-5 col-md-offset-1">
					<div class="form-group">
						<label for="n">Cantidad de numeros a generar</label>
						<input type="text" name="n" id="n" class="form-control" required placeholder="Numeros a gernerar" />
					</div>
				</div>
			</div>

			<center><button class="btn btn-md btn-success" type="button" onclick="return calcular_aleatorio();">Calcular</button></center>
		</form>
	  </div>
	</div>

	<br>
	<br>
	<div class="row">
		<div class="col-md-12">
			<div id="tabla">
			</div>
		</div>
	</div>
@endsection

@section('script')
	<script src="{{ asset('assets/js/vendor/jquery-2.1.4.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/columns/jquery.columns.min.js') }}"></script>
	<script type="text/javascript">
		function calcular_aleatorio() {
			var datos = $('#formulario').serialize();
			console.log(datos);
			$.ajax({
				headers: {
			        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    },
				url: '{{ route('montecarlo.store') }}',
				type: 'POST',
				data: datos,
			})
			.done(function(datox) {
				$('#tabla').html(datox);
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
			
		}
	</script>
@endsection