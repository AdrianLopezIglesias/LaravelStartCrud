@extends('layouts.app')

@section('content')

	@include('components.secciones.header', ['titulo'=>'Salón', 'nombre' => $salon->nombre, 'urlBack' => '/salons' ])
	<div class="card">
		<div class="card-header">
			@include('salons.navigation')
		</div>
		<div class="card-body">
			<div id="salon_contenido"></div>
		</div>
	</div>
	<br>

@endsection