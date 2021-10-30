<section class="content-header">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">
				@if(isset($paciente))
				<h1>Actualizar datos de paciente</h1>
				@else
				<h1>Ingresar un nuevo paciente</h1>
				@endif
			</div>
		</div>
	</div>
</section>

<div class="content px-3">

	@include('adminlte-templates::common.errors')

	<div class="card">

		<form id="pacientes_store" action="/paciente/render" method="POST">

			<div class="card-body">

				@include('pacientes.fields')
				
			</div>
			
			<div class="card-footer">
				@if (isset($paciente))
				<input type="hidden" name="redirect" value="datos_personales_tabla">
				<input type="hidden" name="paciente" value="{{$paciente->id}}">

				<button class="btn btn-outline-secondary w-100" id="load-div-button" data-tgt="#paciente_contenido"
				data-attr="/paciente/render" data-form="pacientes_store" data-opt='{"access": "pacientes", 
				"view": "store_new", 
				"update": "si", 
				"ajax":"si",
				"redirect": "datos_personales_tabla"}'>
				Actualizar datos
			</button>
			@else
				<input type="hidden" name="view" value="store_new">
				<input type="hidden" name="redirect" value="si">
				<input type="submit" class="btn btn-outline-secondary" id="button_crear_paciente" value="Confirmar creación ">
				@endif
				<a href="{{ route('pacientes.index') }}" class="btn btn-default">Cancel</a>
			</div>
		</form>


	</div>
</div>