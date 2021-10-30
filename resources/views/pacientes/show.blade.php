@extends('layouts.app')

@section('content')

	@include('components.secciones.header', ['titulo'=>'Paciente', 'nombre' => $paciente->nombre, 'urlBack' => '/pacientes' ])
	<div class="card">
		<div class="card-header">
			@include('pacientes.navigation')
		</div>
		<div class="card-body">
			<div id="paciente_contenido">
				@include('paciente_datos_personales.show_fields')
			</div>
		</div>
	</div>
	<br>

@endsection
