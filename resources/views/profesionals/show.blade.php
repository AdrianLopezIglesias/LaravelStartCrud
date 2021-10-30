

@extends('layouts.app')

@section('content')

	@include('components.secciones.header', ['titulo'=>'Profesional', 'nombre' => $profesional->nombre, 'urlBack' => '/profesionals' ])
	<div class="card">
		<div class="card-header">
			@include('profesionals.navigation')
		</div>
		<div class="card-body">
			<div id="profesional_contenido"></div>
		</div>
	</div>
	<br>

@endsection

{{-- 
@extends('layouts.app')

@section('content')

<x-pacientes.header :nombre="$profesional->nombre" />
<div x-data="{ view: 'tratamientos' }">
	<div class="card">
		<div class="card-header">
			@include('profesionals.navigation')
		</div>
		<div class="card-body">
			<div id="profesional_contenido"></div>
		</div>
	</div>
	<br>
</div>

@endsection --}}