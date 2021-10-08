<div class="card">
    <div class="card-header">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h5>Citas agendadas</h5>
            </div>

        </div>
    </div>
    <div class="card-body">
        @include('citas.table', ['citas' => $pacientes->citas, 'view'=>'paciente'])


    </div>
</div>
