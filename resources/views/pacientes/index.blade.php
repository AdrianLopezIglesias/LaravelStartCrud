@extends('layouts.app')
@section('content')
@include('components.secciones.header', ['titulo'=>'Pacientes', 'nombre' => ""])

<div class="card">
	<div class="card-body">
		<table class="table">
			<tbody>
				<tr>
					<td>
					</td>
					<td>
						<button class="btn btn-outline-secondary  w-100" data-toggle="modal" 
							id="modal-open-button"
							data-target="#mediumModal" 
							data-attr="/paciente/render" 
							data-opt='{"view": "nuevo"}'>
							Ingresar nuevo
							paciente</button>
					</td>
				</tr>
				@include('pacientes.search_form')
			</tbody>
		</table>
		@include('pacientes.table')
		<div class="card-footer clearfix float-right">
			<div class="float-right">
				@include('adminlte-templates::common.paginate', ['records' => $pacientes])
			</div>
		</div>
	</div>
</div>

@endsection