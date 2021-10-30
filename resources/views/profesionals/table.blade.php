

<div class="table-responsive">
	<table class="table" id="profesionals-table">
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Especialidad</th>
				<th>Tratamientos disponibles</th>
				<th></th>
			</tr>
		</thead>
			<tbody>
				@foreach($profesionals as $profesional)
				<tr>
					<td>{{ $profesional->nombre }}</td>
					<td></td>
					<td></td>
					<td >
						<a class="btn btn-outline-secondary" 
						href="{{ route('profesionals.show', [$profesional->id]) }}">
						Ver</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		{{-- 
		
		<div class="table-responsive">
			<table class="table" id="salons-table">
				<tbody>
					@foreach($profesionals as $profesional)
					<tr>
						<td>
							<a href="{{ route('profesionals.show', [$profesional->id]) }}" class='btn btn-default btn-xs w-100'>
								{{ $profesional->nombre }}
							</a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div> --}}
</div>