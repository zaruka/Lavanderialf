@extends('layouts.principal')

@section('titulo')
	Linea de Espera
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

	Simulacion de Linea de espera
@endsection

@section('contenido')
	<div class="panel panel-primary">
	  <div class="panel-heading" style="text-align: center;">
	  	<h3>Ingrese los datos para continuar</h3>
	  </div>
	  <div class="panel-body">
	  	<form id="formulario">
	  		<div class="row">
	  			<div class="col-md-6">
				
	  				<label for="eventos">Ingrese el numero de eventos</label>
	  				<div class="input-group">
				      <input type="text" name="eventos" id="eventos" class="form-control" placeholder="Ingrese el numero de eventos">
				      <span class="input-group-btn">
				        <button class="btn btn-primary" onclick="return generar_aleatorios();" type="button">Generar Campos</button>
				      </span>
				    </div>
	  			</div>

	  			<div class="col-md-3">
	  				<label for="lamda">Ingrese lamda</label>
				    <input type="text" name="lamda" id="lamda" class="form-control" placeholder="Ingrese el valor de lamda">
	  			</div>

	  			<div class="col-md-3">
	  				<label for="niu">Ingrese niu</label>
				    <input type="text" name="niu" id="niu" class="form-control" placeholder="Ingrese el valor de niu">
	  			</div>
	  		</div>
		    
		</form>
	  </div>
	</div>

	<br>
	<br>
	<div class="row">
		<div class="col-md-12">
			<div id="llegadaservicio">
			</div>
		</div>
	</div>

	<br>
	<br>
	<div class="row">
		<div class="col-md-12">
			<div id="tablacalculada">
			</div>
		</div>
	</div>
@endsection

@section('script')
	<script src="{{ asset('assets/js/vendor/jquery-2.1.4.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/columns/jquery.columns.min.js') }}"></script>
	<script type="text/javascript">
		function generar_aleatorios() {
			var eventos = $('#eventos').val();
			$.ajax({
				headers: {
			        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    },
				url: '{{ route('linea-espera.store') }}',
				type: 'POST',
				data: {'eventos':eventos},
			})
			.done(function(datox) {
				$('#llegadaservicio').html(datox);
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
			
		}

		function calcular_linea_espera() {
			var datos = $('#llegada, #servicio').find('input').serialize();
			var lamda = $('#lamda').val();
			var niu = $('#niu').val();
			// var servicios = $('#servicio').find('input').serialize();

			$.ajax({
				headers: {
			        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    },
				url: '{{ url('linea-espera-calculo') }}',
				type: 'POST',
				data: datos+'&lamda='+lamda+'&niu='+niu,
			})
			.done(function(datox) {
				$('#tablacalculada').html(datox);
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