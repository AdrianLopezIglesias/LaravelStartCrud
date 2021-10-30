@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Contratacions</h1>
                </div>
                <div class="col-sm-6">

                </div>
            </div>
        </div>
    </section>
		<a class      = "btn btn-outline-secondary action_handler"
			parameters = '{"target": "modal_medium", "vista": "crear", "url": "contratacion/ver/crear"}'
			form = "">
			Ingresar nueva contratacion
		</a>
    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-0">
                @include('contratacions.table')

                <div class="card-footer clearfix float-right">
                    <div class="float-right">
                        @include('adminlte-templates::common.paginate', ['records' => $contratacions])
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

