<div class="col-md-6">
	<table class="table table-bordered table-hover table-striped">
		<tr>
			<th colspan="5">Tabla de probabilidades de llegadas</th>
		</tr>
		<tr>
			<th>Valor</th>
			<th>Probabilidad</th>
			<th>Acumulada</th>
			<th>Menor</th>
			<th>Mayor</th>
		</tr>
		@for ($i = 0; $i < count($tabla_pro_llegada); $i++)
			<tr>
				<td>{{ $tabla_pro_llegada[$i][0] }}</td>
				<td>{{ $tabla_pro_llegada[$i][1] }}</td>
				<td>{{ $tabla_pro_llegada[$i][2] }}</td>
				<td>{{ $tabla_pro_llegada[$i][3] }}</td>
				<td>{{ $tabla_pro_llegada[$i][4] }}</td>
			</tr>
		@endfor
	</table>
</div>

<div class="col-md-6">
	<table class="table table-bordered table-hover table-striped">
		<tr>
			<th colspan="5">Tabla de probabilidades de Servicios</th>
		</tr>
		<tr>
			<th>Valor</th>
			<th>Probabilidad</th>
			<th>Acumulada</th>
			<th>Menor</th>
			<th>Mayor</th>
		</tr>
		@for ($i = 0; $i < count($tabla_pro_servicio); $i++)
			<tr>
				<td>{{ $tabla_pro_servicio[$i][0] }}</td>
				<td>{{ $tabla_pro_servicio[$i][1] }}</td>
				<td>{{ $tabla_pro_servicio[$i][2] }}</td>
				<td>{{ $tabla_pro_servicio[$i][3] }}</td>
				<td>{{ $tabla_pro_servicio[$i][4] }}</td>
			</tr>
		@endfor
	</table>
</div>

<div class="col-md-12">
	<table class="table table-bordered table-hover table-striped" style="text-align: center;">
	<thead>
		<tr>
			<th>#</th>
			<th>Llegada (Aleatorio)</th>
			<th>Servicio (Aleatorio)</th>
			<th>Tiempo entre llegadas</th>
			<th>Tiempo de entre servicio</th>
			<th>Hora de llegada exacta</th>
			<th>Hora de iniciacion del servicio</th>
			<th>Hora de terminacion del servicio</th>
			<th>Tiempo de Espera</th>
			<th>Tiempo en el sistema</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$llegadas = 0;
			$servicio_ini = 0;
			$servicio_fin = 0;
			$t_espera = 0;
			$t_sistema = 0;
			$contador = count($tabla_calculada);
		?>
		<tr>
			<th> 0 </th>
			<th> - </th>
			<th> - </th>
			<th> - </th>
			<th> - </th>
			<th>0</th>
			<th>0</th>
			<th>0</th>
			<th>0</th>
			<th>0</th>
		</tr>
		@for ($i = 0; $i < count($tabla_calculada); $i++)
			<?php
				$llegadas = $llegadas + $tabla_calculada[$i][5];
				$servicio_ini = $servicio_ini + $tabla_calculada[$i][6];
				$servicio_fin = $servicio_fin + $tabla_calculada[$i][7];
				$t_espera = $t_espera + $tabla_calculada[$i][8];
				$t_sistema = $t_sistema + $tabla_calculada[$i][9];
			?>
			<tr>
				<td>{{ $tabla_calculada[$i][0] }}</td>
				<td>{{ $tabla_calculada[$i][1] }}</td>
				<td>{{ $tabla_calculada[$i][2] }}</td>
				<td>{{ $tabla_calculada[$i][3] }}</td>
				<td>{{ $tabla_calculada[$i][4] }}</td>
				<td>{{ $tabla_calculada[$i][5] }}</td>
				<td>{{ $tabla_calculada[$i][6] }}</td>
				<td>{{ $tabla_calculada[$i][7] }}</td>
				<td>{{ $tabla_calculada[$i][8] }}</td>
				<td>{{ $tabla_calculada[$i][9] }}</td>
			</tr>
		@endfor
		<tr>
			<th>Totales</th>
			<th> - </th>
			<th> - </th>
			<th> - </th>
			<th> - </th>
			<th>{{ $llegadas }}</th>
			<th>{{ $servicio_ini }}</th>
			<th>{{ $servicio_fin }}</th>
			<th>{{ $t_espera }}</th>
			<th>{{ $t_sistema }}</th>
		</tr>
		<tr>
			<th>Media</th>
			<th> - </th>
			<th> - </th>
			<th> - </th>
			<th> - </th>
			<th>{{ round($llegadas/$contador, 2) }}</th>
			<th>{{ round($servicio_ini/$contador, 2) }}</th>
			<th>{{ round($servicio_fin/$contador, 2) }}</th>
			<th>{{ round($t_espera/$contador, 2) }}</th>
			<th>{{ round($t_sistema/$contador, 2) }}</th>
		</tr>
	</tbody>
</table>
</div>