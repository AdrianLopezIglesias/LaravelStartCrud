<div class="table-responsive">
	<table class="table" id="tratamientos-table">
		<thead>
			<tr>
				<x-table.column-header column="Nombre" />
				{{-- <x-table.column-header column="Descripcion" " /> --}}
				{{-- <x-table.column-header column="Descripcion Corta" " /> --}}
				{{-- <x-table.column-header column="Area" /> --}}
				<x-table.column-header column="Sesiones" />
				<x-table.column-header column="Valor" />
				<x-table.column-header column="Activo" />
				<x-table.column-header column="Profesional" " />
				<x-table.column-header column="Equipamiento" />
				{{-- <x-table.column-header column="Imagen" " /> --}}
				<x-table.column-header column="" " />
			</tr>
		</thead>
		<tbody>
			@foreach($tratamientos as $tratamiento)
			<tr>
				<td>{{$tratamiento->nombre}}</td>
				{{-- <td>{{$tratamiento->desc}}</td> --}}
				{{-- <td>{{$tratamiento->desc_cort}}</td> --}}
				{{-- <td>{{$tratamiento->area}}</td> --}}
				<td>{{$tratamiento->sesiones}}</td>
				<td>{{$tratamiento->valor}}</td>
				<td>{{$tratamiento->activo}}</td>
				<td>{{$tratamiento->profesional}}</td>
				<td>{{$tratamiento->equipamiento}}</td>
				{{-- <td>{{$tratamiento->imagen_principal}}</td> --}}
				@if($access != 'profesional')
					<td width="120" >
					{!! Form::open(['route' => ['tratamientos.destroy', $tratamiento->id], 'method' => 'delete']) !!}
					<div class='btn-group'>
						<a href="{{ route('tratamientos.show', [$tratamiento->id]) }}" class='btn btn-default btn-xs'>
							<i class="far fa-eye"></i>
						</a>
						<a href="{{ route('tratamientos.edit', [$tratamiento->id]) }}" class='btn btn-default btn-xs'>
							<i class="far fa-edit"></i>
						</a>
						{!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger
						btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
					</div>
					{!! Form::close() !!}
				</td>
			</tr>
			@endif
			@endforeach
		</tbody>
	</table>
</div>
