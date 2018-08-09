<table class="table table-bordered table-hover table-striped" style="text-align: center;">
	<thead>
		<tr>
			<th>Clientes</th>
			<th>Tiempo de llegada</th>
			<th>Tiempo de servicio</th>
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
		?>
		@for ($i = 0; $i < count($datos); $i++)
			<?php
				$llegadas = $llegadas + $datos[$i][5];
				$servicio_ini = $servicio_ini + $datos[$i][6];
				$servicio_fin = $servicio_fin + $datos[$i][7];
				$t_espera = $t_espera + $datos[$i][8];
				$t_sistema = $t_sistema + $datos[$i][9];
			?>
			<tr>
				<td>{{ $datos[$i][0] }}</td>
				<td>{{ $datos[$i][1] }}</td>
				<td>{{ $datos[$i][2] }}</td>
				<td>{{ $datos[$i][3] }}</td>
				<td>{{ $datos[$i][4] }}</td>
				<td>{{ $datos[$i][5] }}</td>
				<td>{{ $datos[$i][6] }}</td>
				<td>{{ $datos[$i][7] }}</td>
				<td>{{ $datos[$i][8] }}</td>
				<td>{{ $datos[$i][9] }}</td>
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