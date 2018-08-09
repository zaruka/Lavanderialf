@extends('layouts.principal')

@section('titulo')
	Linea de Espera Montecarlo
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
	Simulacion de Linea de espera Montecarlo
@endsection

@section('contenido')
	<div class="panel panel-primary">
	  <div class="panel-heading" style="text-align: center;">
	  	<h3>Ingrese los datos para continuar</h3>
	  </div>
	  <div class="panel-body">
	  	<form id="formulario">
	  		<div class="row">
	  			<div class="col-md-4">
	  				<label for="eventos">Numero de eventos para llegadas y salidas</label>
	  				<div class="input-group">
				      <input type="text" name="eventos" id="eventos" class="form-control" placeholder="Ingrese el numero de eventos">
				      <span class="input-group-btn">
				        <button class="btn btn-primary" onclick="return generar_aleatorios();" type="button">Generar Campos</button>
				      </span>
				    </div>
				    <div id="llegadaservicio"></div>
	  			</div>
	  			
	  			<div class="col-md-4">
	  				<label for="nllegadas">Ingrese el numero de eventos de llegada</label>
	  				<div class="input-group">
				      <input type="text" name="nllegadas" id="nllegadas" class="form-control" placeholder="Ingrese el numero de llegadas">
				      <span class="input-group-btn">
				        <button class="btn btn-primary" onclick="return generar_tab_pro(1);" type="button">Generar llegadas</button>
				      </span>
				    </div>
				    <div id="llegadas"></div>
	  			</div>
		    
	  			<div class="col-md-4">
	  				<label for="nservicio">Ingrese el numero de eventos de servicios</label>
	  				<div class="input-group">
				      <input type="text" name="nservicio" id="nservicio" class="form-control" placeholder="Ingrese el numero de servicio">
				      <span class="input-group-btn">
				        <button class="btn btn-primary" onclick="return generar_tab_pro(2);" type="button">Generar servicio</button>
				      </span>
				    </div>
				    <div id="servicios"></div>
	  			</div>
	  		</div>
		</form>
	  </div>
	</div>

	<br>
	<br>
	<div class="row">
		<div class="col-md-12" id="lineamontecarlocalculo"></div>
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

		function generar_tab_pro(tipo) {
			var nllegadas = $('#nllegadas').val();
			$.ajax({
				headers: {
			        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    },
				url: '{{ url('probabilidades_llegada') }}',
				type: 'POST',
				data: {'cantidad':nllegadas, 'tipo':tipo},
			})
			.done(function(datox) {
				if (tipo == 1) {
					$('#llegadas').html(datox);
				}
				if (tipo == 2) {
					$('#servicios').html(datox);
				}
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
		}

		function calcular_linea_espera() {
			var datos = $('#llegada, #servicio, #probabilidad1, #probabilidad2').find('input').serialize();
			$.ajax({
				headers: {
			        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    },
				url: '{{ url('linea-montecarlo-calculo') }}',
				type: 'POST',
				data: datos,
			})
			.done(function(datox) {
				$('#lineamontecarlocalculo').html(datox);
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