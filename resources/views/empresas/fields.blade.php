<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control','maxlength' => 255,'minlength' => 5]) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Logotipo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('logotipo', 'Logotipo:') !!}
    <div class="input-group">
        <div class="custom-file">
            {!! Form::file('logotipo', ['class' => 'custom-file-input']) !!}
            {!! Form::label('logotipo', 'Choose file', ['class' => 'custom-file-label']) !!}
        </div>
    </div>
</div>
<div class="clearfix"></div>


<!-- Sitioweb Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sitioweb', 'Sitioweb:') !!}
    {!! Form::text('sitioweb', null, ['class' => 'form-control']) !!}
</div>