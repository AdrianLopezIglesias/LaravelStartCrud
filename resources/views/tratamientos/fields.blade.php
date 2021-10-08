<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Descripcion Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    {!! Form::textarea('descripcion', null, ['class' => 'form-control']) !!}
</div>

<!-- Descripcion Corta Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('descripcion_corta', 'Descripcion Corta:') !!}
    {!! Form::textarea('descripcion_corta', null, ['class' => 'form-control']) !!}
</div>

<!-- Area Field -->
<div class="form-group col-sm-6">
    {!! Form::label('area', 'Area:') !!}
    {!! Form::text('area', null, ['class' => 'form-control']) !!}
</div>

<!-- Sesiones Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sesiones', 'Sesiones:') !!}
    {!! Form::number('sesiones', null, ['class' => 'form-control']) !!}
</div>

<!-- Valor Field -->
<div class="form-group col-sm-6">
    {!! Form::label('valor', 'Valor:') !!}
    {!! Form::number('valor', null, ['class' => 'form-control']) !!}
</div>

<!-- Activo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('activo', 'Activo:') !!}
    {!! Form::select('activo', ['0' => '0', '1' => '1'], null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Imagen Principal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('imagen_principal', 'Imagen Principal:') !!}
    <div class="input-group">
        <div class="custom-file">
            {!! Form::file('imagen_principal', ['class' => 'custom-file-input']) !!}
            {!! Form::label('imagen_principal', 'Choose file', ['class' => 'custom-file-label']) !!}
        </div>
    </div>
</div>
<div class="clearfix"></div>
