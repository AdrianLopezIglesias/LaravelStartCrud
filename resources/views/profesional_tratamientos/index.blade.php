
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profesional Tratamientos</h1>
                </div>
                <div class="col-sm-6">
									<button type="button" class="btn btn-default float-right button-open-modal" data-toggle="modal"
									id="modal-open-button" data-target="#mediumModal" data-attr="/profesionalTratamientos/render"
									data-opt='{"profesional": {{$profesional}}, "access": "profesional", "view": "new"}'>
									Agregar tratamiento
								</button>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-0">
                @include('profesional_tratamientos.table')

                <div class="card-footer clearfix float-right">
                    <div class="float-right">
                        @include('adminlte-templates::common.paginate', ['records' => $profesionalTratamientos])
                    </div>
                </div>
            </div>

        </div>
    </div>


