<div class="table-responsive">
	<table class="table" id="citas-table">
		<thead>
			<tr>
				<x-table.column-header column="Tratamiento" />
				<x-table.column-header column="Paciente" />
				<x-table.column-header column="Profesional" />
				<x-table.column-header column="Centro" />
				<x-table.column-header column="Dia" />
				<x-table.column-header column="Horario" />
			</tr>
		</thead>
		<tbody>
			@foreach($citas as $cita)
			<tr>
				<x-table.column-cell :column="$cita->tratamiento->nombre" />
				<x-table.column-cell :column="$cita->paciente->nombre" :link="'/pacientes/' . $cita->paciente->id" />
				<td>
					@foreach($cita->profesional as $p)
					{{$p->nombre}}
					@endforeach
				</td>
				<x-table.column-cell column='Centro 1' />
				<x-table.column-cell :column='$cita->dia->format("l d/m/Y")' />
				<x-table.column-cell :column="App\Helpers\TimeHelper::getTime($cita->turno)" />
			</tr>
			@endforeach
		</tbody>
	</table>
</div>