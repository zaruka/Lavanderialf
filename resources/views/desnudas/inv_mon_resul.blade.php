<div class="col-md-6">
	<table class="table table-bordered table-hover table-striped">
		<tr>
			<th colspan="5">Tabla de probabilidades de demandas</th>
		</tr>
		<tr>
			<th>Valor</th>
			<th>Probabilidad</th>
			<th>Acumulada</th>
			<th>Menor</th>
			<th>Mayor</th>
		</tr>
		@for ($i = 0; $i < count($tabla_pro_demanda); $i++)
			<tr>
				<td>{{ $tabla_pro_demanda[$i][0] }}</td>
				<td>{{ $tabla_pro_demanda[$i][1] }}</td>
				<td>{{ $tabla_pro_demanda[$i][2] }}</td>
				<td>{{ $tabla_pro_demanda[$i][3] }}</td>
				<td>{{ $tabla_pro_demanda[$i][4] }}</td>
			</tr>
		@endfor
	</table>
</div>

<div class="col-md-6">
	<table class="table table-bordered table-hover table-striped">
		<tr>
			<th colspan="5">Tabla de probabilidades de Entregas</th>
		</tr>
		<tr>
			<th>Valor</th>
			<th>Probabilidad</th>
			<th>Acumulada</th>
			<th>Menor</th>
			<th>Mayor</th>
		</tr>
		@for ($i = 0; $i < count($tabla_pro_entrega); $i++)
			<tr>
				<td>{{ $tabla_pro_entrega[$i][0] }}</td>
				<td>{{ $tabla_pro_entrega[$i][1] }}</td>
				<td>{{ $tabla_pro_entrega[$i][2] }}</td>
				<td>{{ $tabla_pro_entrega[$i][3] }}</td>
				<td>{{ $tabla_pro_entrega[$i][4] }}</td>
			</tr>
		@endfor
	</table>
</div>

<div class="col-md-12">
	<table class="table table-bordered table-hover table-striped" style="text-align: center;">
	<thead>
		<tr>
			<th rowspan="2">#</th>
			<th rowspan="2">Ri (Aleatorio de demandas)</th>
			<th rowspan="2">Demandas - Venta</th>
			<th rowspan="1" colspan="3">Inventario</th>
			<th rowspan="2">Costo por faltante</th>
			<th rowspan="2">Costo de mantener</th>
			<th rowspan="2">Costo de ordenar</th>
			<th rowspan="2">Ri (Aleatorio de entregas)</th>
			<th rowspan="2">Tiempo de entrega</th>
			<th rowspan="2">Dia de entrega</th>
		</tr>
		<tr>
			<th>Inicial</th>
			<th>Ingresos</th>
			<th>Final</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$sum_cos_fal = 0;
			$sum_cos_man = 0;
			$sum_cos_ord = 0;
		?>
		@for ($i = 0; $i < count($tabla_calculada); $i++)
			<tr>
				<?php
					$sum_cos_fal = $sum_cos_fal + $tabla_calculada[$i][6];
					$sum_cos_man = $sum_cos_man + $tabla_calculada[$i][7];
					$sum_cos_ord = $sum_cos_ord + $tabla_calculada[$i][8];
				?>
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
				<td>{{ $tabla_calculada[$i][10] }}</td>
				<td>{{ $tabla_calculada[$i][11] }}</td>
			</tr>
		@endfor
		<tr>
			<th colspan="6">Totales</th>
			<th>{{ $sum_cos_fal }}</th>
			<th>{{ $sum_cos_man }}</th>
			<th>{{ $sum_cos_ord }}</th>
			<th>-</th>
			<th>-</th>
			<th>-</th>
		</tr>
	</tbody>
</table>
</div>