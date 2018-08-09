<div class="col-md-6">
	@if ($bandera == 2)
		<label>Datos Aleatorios de las demandas</label>
	@else
		<label>Datos Aleatorios de llegada</label>
	@endif
	<table class="table" id="llegada">
		<?php $contador = 0;?>
		@for ($i = 0; $i < count($aleatorios_llegada); $i++)
			<?php $contador = $contador + 1;?>
			<tr>
				<th>{{ $contador }}</th>
				<td>
					<input type="text" class="form-control" name="aleatorio_llegada[]" id="llegada{{ $contador }}" value="{{ $aleatorios_llegada[$i] }}" />
				</td>
			</tr>
		@endfor
	</table>
</div>
<div class="col-md-6">
	@if ($bandera == 2)
		<label>Datos Aleatorios de las Entregas</label>
	@else
		<label>Datos Aleatorios de Servicio</label>
	@endif
	
	<table class="table" id="servicio">
		<?php $contador = 0;?>
		@for ($i = 0; $i < count($aleatorios_servicio); $i++)
			<?php $contador = $contador + 1;?>
			<tr>
				<th>{{ $contador }}</th>
				<td>
					<input type="text" class="form-control" name="aleatorio_servicio[]" id="servicio{{ $contador }}" value="{{ $aleatorios_servicio[$i] }}" />
				</td>
			</tr>
		@endfor
	</table>
</div>
<div class="col-md-12">
	<button class="btn btn-primary btn-md" type="button" onclick="return calcular_linea_espera();">Calcular</button>
</div>