<div class="col-md-12">
	<label>
		{{-- Si el valor de la variable tipo es igual a 1 entonces muestra la frase para las llegadas caso contrario muestra la frase para los servicios--}}
		@if ($tipo == 1)
			Probabilidades de llegada
		@else
			@if ($tipo == 2)
				Probabilidades de servicio
			@else
				@if ($tipo == 3)
					Probabilidades de demandas
				@else
					Probabilidades de retrasos
				@endif
			@endif
		@endif
	</label>
	<table class="table" id="probabilidad{{ $tipo }}">
		<tr>
			<th>Valor</th>
			<th>Probabilidad</th>
		</tr>
		{{-- Este es el bucle que genera los inputs para valores cn sus respectivas probabilidades --}}
		@for ($i = 0; $i < $valor_n; $i++)
			<tr>
				<td>
					<input type="text" class="form-control" name="valor{{ $tipo }}[]" placeholder="Valor" />
				</td>
				<td>
					<input type="text" class="form-control" name="probabilidad{{ $tipo }}[]" placeholder="Probabilidad" />
				</td>
			</tr>
		@endfor
	</table>
</div>