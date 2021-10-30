<div class="table-responsive">
	<table class="table" id="profesionalHorarios-table">
		<thead>
			<tr>
				<th>Salon Id</th>
				<th>Dia</th>
				<th>Hora Inicio</th>
				<th>Hora Fin</th>
				<th colspan="3">Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($profesionalHorarios as $profesionalHorario)
			<tr>
				<td>{{ $profesionalHorario->salon->nombre }}</td>
				<td>{{ $profesionalHorario->dia_semana_show }}</td>
				<td>{{ $profesionalHorario->hora_inicio_show }}</td>
				<td>{{ $profesionalHorario->hora_fin_show }}</td>
				<td width="120">
					{!! Form::open(['route' => ['profesionalHorarios.destroy', $profesionalHorario->id], 'method' => 'delete'])
					!!}
					<div class='btn-group'>
						<a href="{{ route('profesionalHorarios.show', [$profesionalHorario->id]) }}" class='btn btn-default btn-xs'>
							<i class="far fa-eye"></i>
						</a>
						<a href="{{ route('profesionalHorarios.edit', [$profesionalHorario->id]) }}" class='btn btn-default btn-xs'>
							<i class="far fa-edit"></i>
						</a>
						{!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger
						btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
					</div>
					{!! Form::close() !!}
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>