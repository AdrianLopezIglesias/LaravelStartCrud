<section class = "content-header">
<div     class = "container-fluid">
<div     class = "row mb-2">
<div     class = "col-sm-12">
				<h1>Create Tratamiento</h1>
			</div>
		</div>
	</div>
</section>

<div class = "content px-3">
	@include('adminlte-templates::common.errors')
	<div  class = "card">
	<form id    = "form_tratamiento_store">
	<div  class = "card-body">
					@include('tratamientos.fields')
			</div>

			<div class = "card-footer">
			<a   href  = "{{ route('pacientes.index') }}"
			     class = "btn btn-default">Cancel</a>
			</div>

			<a class      = "btn btn-outline-secondary action_handler close_modal"
			   id         = "boton_tratamiento_store"
			   parameters = '{"target": "sec_1", "url": "tratamiento/transmutar/0/tabla"}'
			   form       = "form_tratamiento_store">
				Ingresar nuevo tratamiento
			</a>
		</form>

	</div>
</div>