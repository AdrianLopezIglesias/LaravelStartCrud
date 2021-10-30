<div class="table-responsive">
	<table class="table" id="salonHorarios-table">
		<thead>
			<tr>
				<th>Cerrado</th>
				<th>Dia de la semana</th>
				<th>Hora Inicio</th>
				<th>Hora Fin</th>
				<th colspan="3">Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($salonHorarios as $salonHorario)
			<tr>
				<td>{{ $salonHorario->cerrado }}</td>
				<td>{{ $salonHorario->dia_semana_show }}</td>
				<td>{{ $salonHorario->hora_inicio_show }}</td>
				<td>{{ $salonHorario->hora_fin_show }}</td>
				<td width="120">
					<button class="btn btn-outline-secondary " 
					data-toggle="modal" 
					id="modal-open-button" 
					data-target="#mediumModal"
					data-attr="/salon/render" 
					data-opt='{"salonHorario": {{$salonHorario->id}}, "view": "salonHorario_editar"}'
					href="#">Editar </button>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>