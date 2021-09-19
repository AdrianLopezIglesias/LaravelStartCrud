<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $empresa->id }}</p>
</div>

<!-- Nombre Field -->
<div class="col-sm-12">
    {!! Form::label('nombre', 'Nombre:') !!}
    <p>{{ $empresa->nombre }}</p>
</div>

<!-- Email Field -->
<div class="col-sm-12">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $empresa->email }}</p>
</div>

<!-- Logotipo Field -->
<div class="col-sm-12">
    {!! Form::label('logotipo', 'Logotipo:') !!}
    <p>{{ $empresa->logotipo }}</p>
</div>

<!-- Sitioweb Field -->
<div class="col-sm-12">
    {!! Form::label('sitioweb', 'Sitioweb:') !!}
    <p>{{ $empresa->sitioweb }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $empresa->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $empresa->updated_at }}</p>
</div>

