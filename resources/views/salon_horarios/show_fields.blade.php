<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $salonHorario->id }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $salonHorario->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $salonHorario->updated_at }}</p>
</div>

<!-- Salon Id Field -->
<div class="col-sm-12">
    {!! Form::label('salon_id', 'Salon Id:') !!}
    <p>{{ $salonHorario->salon_id }}</p>
</div>

<!-- Dia Field -->
<div class="col-sm-12">
    {!! Form::label('dia', 'Dia:') !!}
    <p>{{ $salonHorario->dia }}</p>
</div>

<!-- Hora Inicio Field -->
<div class="col-sm-12">
    {!! Form::label('hora_inicio', 'Hora Inicio:') !!}
    <p>{{ $salonHorario->hora_inicio }}</p>
</div>

<!-- Hora Fin Field -->
<div class="col-sm-12">
    {!! Form::label('hora_fin', 'Hora Fin:') !!}
    <p>{{ $salonHorario->hora_fin }}</p>
</div>

