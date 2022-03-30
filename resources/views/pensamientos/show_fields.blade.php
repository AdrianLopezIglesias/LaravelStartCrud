<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $pensamiento->id }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $pensamiento->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $pensamiento->updated_at }}</p>
</div>

<!-- Texto Field -->
<div class="col-sm-12">
    {!! Form::label('texto', 'Texto:') !!}
    <p>{{ $pensamiento->texto }}</p>
</div>

<!-- Metadata Field -->
<div class="col-sm-12">
    {!! Form::label('metadata', 'Metadata:') !!}
    <p>{{ $pensamiento->metadata }}</p>
</div>

