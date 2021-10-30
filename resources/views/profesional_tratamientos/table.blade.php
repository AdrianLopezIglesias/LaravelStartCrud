<div class="table-responsive">
	<table class="table" id="profesionalTratamientos-table">
		<thead>
			<tr>
				<th>Profesional Id</th>
				<th>Tratamiendo Id</th>
				<th colspan="3">Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($profesionalTratamientos as $profesionalTratamiento)
			<tr>
				<td><a href='/profesionals/{{$profesionalTratamiento->profesional_id}}' >{{$profesionalTratamiento->profesional->nombre}}</a></td>
				<td><a href='/tratamientos/{{$profesionalTratamiento->tratamiento_id}}' >{{$profesionalTratamiento->tratamiento->nombre}}</a></td>
				<td width="120">
					{!! Form::open(['route' => ['profesionalTratamientos.destroy', $profesionalTratamiento->id], 'method' =>
					'delete']) !!}
					<div class='btn-group'>
						<a href="{{ route('profesionalTratamientos.show', [$profesionalTratamiento->id]) }}"
							class='btn btn-default btn-xs'>
							<i class="far fa-eye"></i>
						</a>
						<a href="{{ route('profesionalTratamientos.edit', [$profesionalTratamiento->id]) }}"
							class='btn btn-default btn-xs'>
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