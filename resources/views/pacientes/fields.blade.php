<!-- Nombre Field -->
@csrf

<div class="form-group w-100">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', $paciente->nombre ?? "", ['class' => 'form-control']) !!}
</div>
<div class="form-group w-100">
    {!! Form::label('dni', 'DNI:') !!}
    {!! Form::text('dni',  $pacienteDatosPersonales->dni ?? "", ['class' => 'form-control']) !!}
</div>
<div class="form-group w-100">
    {!! Form::label('fecha_nacimiento', 'Fecha de nacimiento:') !!}
    {!! Form::date('fecha_nacimiento',  $pacienteDatosPersonales->fecha_nacimiento ?? "", ['class' => 'form-control']) !!}
</div>
<div class="form-group w-100">
    {!! Form::label('domicilio', 'Domicilio:') !!}
    {!! Form::text('domicilio',  $pacienteDatosPersonales->domicilio ?? "", ['class' => 'form-control']) !!}
</div>
<div class="form-group w-100">
    {!! Form::label('telefono_principal', 'Telefono Principal:') !!}
    {!! Form::text('telefono_principal',  $pacienteDatosPersonales->telefono_principal ?? "", ['class' => 'form-control']) !!}
</div>
<div class="form-group w-100">
    {!! Form::label('telefono_emergencias', 'Telefono de emergencia:') !!}
    {!! Form::text('telefono_emergencias',  $pacienteDatosPersonales->telefono_emergencias ?? "", ['class' => 'form-control']) !!}
</div>
<div class="form-group w-100">
    {!! Form::label('genero', 'Genero:') !!}
    {!! Form::text('genero',  $pacienteDatosPersonales->genero ?? "", ['class' => 'form-control']) !!}
</div>


