@extends('layouts.app')

@section('content')
<div class="container">
  <x-pacientes.header :nombre="$pacientes->nombre" />
  <br>
  <div x-data="{ view: 'contrataciones' }">
    <div class="card">
      <div class="card-header">
        <x-pacientes.navigation />
      </div>
      <div class="card-body">
        <template  x-if="view == 'citas'">
          @include('citas.table', ['citas' => $pacientes->citas, 'view'=>'paciente'])
        </template>
        <template   x-if="view == 'contrataciones'">
<div>
					<button type="button" class="btn btn-default float-right button-open-modal" data-toggle="modal" id="modal-open-button" data-target="#mediumModal" data-attr="/contratacions/render" data-opt='{"paciente": {{$pacientes->id}}, "view": "new"}'>
							Nueva contratación
					</button>
          @include('contratacions.table', ['contratacions' => $pacientes->contrataciones, 'view'=>'paciente'])
</div>
        </template>

      </div>
    </div>
  </div>
  <br>

</div>


@endsection
