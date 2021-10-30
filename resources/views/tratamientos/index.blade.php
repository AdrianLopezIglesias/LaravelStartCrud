@extends('layouts.app')

@section('content')
<section class = "content-header">
<div     class = "container-fluid">
<div     class = "row mb-2">
<div     class = "col-sm-6">
				<h1>Tratamientos</h1>
			</div>
			<div class = "col-sm-6">

			</div>
		</div>
	</div>
</section>

<a class      = "btn btn-outline-secondary action_handler"
   id         = "boton_tratamiento_abrir_form"
   parameters = '{"target": "modal_medium", "url": "tratamiento/ver/crear"}'
   form       = "">
	Ingresar nuevo tratamiento
</a>

<div class = "content px-3">

	@include('flash::message')

	<div class = "clearfix"></div>

	<div class = "card">
	<div class = "card-body p-0">
			@include('tratamientos.table')

		</div>

	</div>
</div>

@endsection