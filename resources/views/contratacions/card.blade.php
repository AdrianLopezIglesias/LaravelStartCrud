<div class="card">
    <div class="card-header">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h5>Contrataciones</h5>
            </div>
            <div class="col-sm-6">
                <button type="button" class="btn btn-default float-right button-open-modal" data-toggle="modal" id="modal-open-button" data-target="#mediumModal" data-attr="/contratacions/render" data-opt='{"paciente": {{$pacientes->id}}, "view": "new"}'>
                    Nueva contratación
                </button>
            </div>
        </div>
    </div>
    <div class="card-body">
        @include('contratacions.table', ['contratacions' => $pacientes->contrataciones, 'view'=>'paciente'])

    </div>
</div>
