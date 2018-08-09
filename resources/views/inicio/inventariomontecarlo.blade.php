@extends('layouts.principal')

@section('titulo')
	Inventario - Montecarlo
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
	Simulacion de Inventarios - Montecarlo
@endsection

@section('contenido')
	<div class="panel panel-primary">
	  <div class="panel-heading" style="text-align: center;">
	  	<h3>Ingrese los datos de la politica del Ejercicio</h3>
	  </div>
	  <div class="panel-body">
	  	<form id="formulario">
	  		<div class="row">
	  			<div class="col-md-6">
	  				<div class="form-group">
		  				<label for="r">Ingrese el valor para el punto de reorden(R)</label>
					    <input type="text" name="r" id="r" class="form-control" placeholder="Ingrese el valor para R">
				    </div>
	  			</div>

	  			<div class="col-md-6">
	  				<div class="form-group">
		  				<label for="q">Ingrese el valor para Q</label>
					    <input type="text" name="q" id="q" class="form-control" placeholder="Ingrese el valor para Q">
				    </div>
	  			</div>
	  		</div>
		    
		    <div class="row">
	  			<div class="col-md-6">
	  				<div class="form-group">
		  				<label for="inv_ini">Ingrese el valor para inventario inicial</label>
					    <input type="text" name="inv_ini" id="inv_ini" class="form-control" placeholder="Ingrese el valor para inventario inicial">
				    </div>
	  			</div>

	  			<div class="col-md-6">
	  				<div class="form-group">
		  				<label for="ch">Ingrese el valor para el costo de mantenimiento(Ch)</label>
					    <input type="text" name="ch" id="ch" class="form-control" placeholder="Ingrese el valor para Ch">
				    </div>
	  			</div>
	  		</div>

	  		<div class="row">
	  			<div class="col-md-6">
	  				<div class="form-group">
		  				<label for="co">Ingrese el valor para el costo de ordenar(Co)</label>
					    <input type="text" name="Co" id="co" class="form-control" placeholder="Ingrese el valor para Co">
				    </div>
	  			</div>

	  			<div class="col-md-6">
	  				<div class="form-group">
		  				<label for="cf">Ingrese el valor para Cf</label>
					    <input type="text" name="cf" id="cf" class="form-control" placeholder="Ingrese el valor para Cf">
				    </div>
	  			</div>
	  		</div>

	  		<div class="row">
	  			<div class="col-md-4">
	  				<label for="eventos">Numero de eventos para llegadas y salidas</label>
	  				<div class="input-group">
				      <input type="text" name="eventos" id="eventos" class="form-control" placeholder="Ingrese el numero de eventos">
				      <span class="input-group-btn">
				        <button class="btn btn-primary" onclick="return generar_aleatorios();" type="button">Generar Campos</button>
				      </span>
				    </div>
				    <div id="aleatorios"></div>
	  			</div>
	  			
	  			<div class="col-md-4">
	  				<label for="ndemanda">Ingrese el numero de eventos de Demandas</label>
	  				<div class="input-group">
				      <input type="text" name="ndemanda" id="ndemanda" class="form-control" placeholder="Ingrese el numero de demandas" />
				      <span class="input-group-btn">
				        <button class="btn btn-primary" onclick="return generar_tab_pro(3);" type="button">Generar demandas</button>
				      </span>
				    </div>
				    <div id="demandas"></div>
	  			</div>
		    
	  			<div class="col-md-4">
	  				<label for="nretraso">Ingrese el numero de eventos de Retraso</label>
	  				<div class="input-group">
				      <input type="text" name="nretraso" id="nretraso" class="form-control" placeholder="Ingrese el numero de retrasos" />
				      <span class="input-group-btn">
				        <button class="btn btn-primary" onclick="return generar_tab_pro(4);" type="button">Generar retrasos</button>
				      </span>
				    </div>
				    <div id="retrasos"></div>
	  			</div>
	  		</div>
		</form>
	  </div>
	</div>

	<br><br>

	<div class="row">
		<div class="col-md-12">
			<div id="resuelta"></div>
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
				data: {'eventos':eventos, 'tipo':2},
			})
			.done(function(datox) {
				$('#aleatorios').html(datox);
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
		}

		function generar_tab_pro(tipo) {
			var ndemandas = $('#ndemanda').val();
			var nretrasos = $('#nretraso').val();
			var aenviar = ndemandas;
			if (tipo == 4) {
				aenviar = nretrasos;
			}
			$.ajax({
				headers: {
			        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    },
				url: '{{ url('probabilidades_llegada') }}',
				type: 'POST',
				data: {'cantidad':aenviar, 'tipo':tipo},
			})
			.done(function(datox) {
				if (tipo == 3) {
					$('#demandas').html(datox);
				}
				if (tipo == 4) {
					$('#retrasos').html(datox);
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
			var datos = $('#formulario').serialize();
			$.ajax({
				headers: {
			        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    },
				url: '{{ route('inventario-montecarlo.store') }}',
				type: 'POST',
				data: datos,
			})
			.done(function(datox) {
				$('#resuelta').html(datox);
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