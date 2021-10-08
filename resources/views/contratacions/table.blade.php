<div class="table-responsive">
	<table class="table" id="contratacions-table">
		<thead>
			<tr>
				<th>Tratamiento</th>
				@if(!isset($view))
				<th>Paciente</th>
				@endif
				<th>Pagado</th>
				<th>Pendiente de pago</th>
				<th>Sesiones pendientes</th>
				<th colspan="3">Acciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach($contratacions as $contratacion)
			<tr>
				<td>{{ $contratacion->tratamiento->nombre }}</td>

				@if(!isset($view))
				<td>
					<a href="/pacientes/{{$contratacion->paciente->id}}">
						{{ $contratacion->paciente->nombre }}
					</a>
				</td>
				@endif

				<td>${{ $contratacion->valor_pagado ?? 0}}</td>
				<td>${{ $contratacion->tratamiento->valor -$contratacion->valor_pagado  }}</td>
				<td>{{ $contratacion->tratamiento->sesiones - count($contratacion->citas)}}</td>

				<td width="120">
					<div class="dropdown">
						<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
							data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Acciones
						</button>
						<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
							<a class="dropdown-item btn btn-default btn-xs" 
								data-toggle="modal" 
								id="modal-open-button" 
								data-target="#mediumModal"
								data-attr="/contratacions/render" 
								data-opt='{"contratacion": {{$contratacion->id}}, "view": "ver"}'>
								<i class="far fa-eye"> 
									Ver detalles
								</i>
							</a>
							<a class="dropdown-item btn btn-default btn-xs" 
								data-toggle="modal" 
								id="modal-open-button" 
								data-target="#mediumModal"
								data-attr="/contratacions/render" 
								data-opt='{"contratacion": {{$contratacion->id}}, "view": "agendar"}'>
								<i class="far fa-calendar"> Agendar cita</i></a>
						</div>
					</div>

				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>