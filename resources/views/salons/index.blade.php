@extends('layouts.app')

@section('content')
@include('components.secciones.header', ['titulo'=>'Salones', 'nombre' => "", 'urlBack' => '/salons' ])


<div class="container-fluid">

	@include('flash::message')

	<div class="clearfix"></div>

	<div class="card">
		<div class="card-body">
			@include('salons.table')

			<a class="btn btn-secondary w-100" href="{{ route('salons.create') }}">
				Agregar un salón nuevo
			</a>
			<br />
		</div>
		<div class="card-footer clearfix float-right">
			<div class="float-right">
				@include('adminlte-templates::common.paginate', ['records' => $salons])
			</div>
		</div>
	</div>


</div>
</div>

@endsection