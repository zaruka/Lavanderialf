@extends('layouts.principal')

@section('titulo')
	INICIO
@endsection

@section('menu')
	@include('menu.menu')
@endsection

@section('cabecera')
	@include('cabecera.cabecera')
@endsection
@section('contenido')
<div class="panel panel-primary">
	  <div class="panel-heading" style="text-align: center;">
	  	<h3>Lavanderia lava fácil</h3><br>
	  	    	
	  	<div class="navbar-header">
	  	<a class="navbar-brand"><img src="{{ asset('imagenes/inico.jpg') }}" width="700px" alt="Logo"></a>
	  	</div>
	  <br>


	  	<h5>Descripción: Lavado de ropa, lavado en seco</h5>
	  	Dirección: Calle 12 y Av. 19
		<a href="https://www.edina.com.ec/mapa_rutag.aspx?i=26388&s=1&r=Lava+F%c3%a1cil&u=Manta%2cMANABI" target="_blank"> <h4>¿Cómo llegar a esta dirección?</h4></a>

		Ubicación: ECUADOR, MANABI, MANTA <br>
		Teléfono: 05-2623314 <br>
		Celular: 0988505884
	  </div>
	</div>
	

@endsection