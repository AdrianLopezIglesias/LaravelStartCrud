<div class="table-responsive">
	<table class="table" id="pacientes-table">
		<thead>
			<tr>
				<th>Nombre</th>
				<th>DNI</th>
				<th>Tratamientos contratados</th>
				<th>Citas agendadas</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach($pacientes as $paciente)
			<tr>
				<td>{{ $paciente->nombre }}</td>
				<td>{{ $paciente->datosPersonales->dni }}</td>
				<td></td>
				<td></td>

				<td>
					<a class="btn btn-outline-secondary" 
					href="{{ route('pacientes.show', [$paciente->id]) }}">
						Ver
					</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>