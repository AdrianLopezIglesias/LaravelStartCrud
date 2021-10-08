<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $cita->id }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $cita->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $cita->updated_at }}</p>
</div>

<!-- Inicio Field -->
<div class="col-sm-12">
    {!! Form::label('inicio', 'Inicio:') !!}
    <p>{{ $cita->inicio }}</p>
</div>

<!-- Fin Field -->
<div class="col-sm-12">
    {!! Form::label('fin', 'Fin:') !!}
    <p>{{ $cita->fin }}</p>
</div>

<!-- Asignacion Id Field -->
<div class="col-sm-12">
    {!! Form::label('asignacion_id', 'Asignacion Id:') !!}
    <p>{{ $cita->asignacion_id }}</p>
</div>

<!-- Tratamiento Id Field -->
<div class="col-sm-12">
    {!! Form::label('tratamiento_id', 'Tratamiento Id:') !!}
    <p>{{ $cita->tratamiento_id }}</p>
</div>

<!-- Paciente Id Field -->
<div class="col-sm-12">
    {!! Form::label('paciente_id', 'Paciente Id:') !!}
    <p>{{ $cita->paciente_id }}</p>
</div>

