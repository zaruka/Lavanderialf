<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>#</th>
			<th>Xn</th>
			<th>[(a*Xn)+c]</th>
			<th>[(a*Xn)+c] mod m</th>
			<th>ri = (Xn + 1)/m</th>
		</tr>
	</thead>
	<tbody>
		@for ($i = 0; $i < count($datos); $i++)
			<tr>
				<td>{{ $datos[$i][0] }}</td>
				<td>{{ $datos[$i][1] }}</td>
				<td>{{ $datos[$i][2] }}</td>
				<td>{{ $datos[$i][3] }}</td>
				<td>{{ $datos[$i][4] }}</td>
			</tr>
		@endfor
	</tbody>
</table>