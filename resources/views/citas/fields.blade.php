<!-- Inicio Field -->
<div class="form-group col-sm-6">
  {!! Form::label('inicio', 'Dia:') !!}
  {!! Form::text('inicio', null, ['class' => 'form-control','id'=>'inicio']) !!}
</div>


<!-- Fin Field -->
<div class="form-group col-sm-6">
  {!! Form::label('fin', 'Turno:') !!}
  {!! Form::text('fin', null, ['class' => 'form-control','id'=>'fin']) !!}
</div>


<?php
// $tratamiento = App\Models\Tratamiento::get()->pluck('nombre', 'id');
// $paciente = App\Models\Pacientes::all()->pluck('nombre', 'id');
// $contratacion = App\Models\Pacientes::all()->pluck('nombre', 'id');
// <div class="form-group w-100">
//   {!! Form::label('tratamiento_id', 'Tratamiento:') !!}
//   {!! Form::select('tratamiento_id', $tratamiento, null, ['class' => 'form-control']) !!}
// </div>
// <div class="form-group w-100">
//   {!! Form::label('paciente_id', 'Paciente:') !!}
//   {!! Form::select('paciente_id', $paciente, null, ['class' => 'form-control']) !!}
// </div>
?>
<input type="hidden" name="asignacion_id" value="1">
<input type="hidden" name="tratamiento_id" value="1">
<input type="hidden" name="paciente_id" value="1">
