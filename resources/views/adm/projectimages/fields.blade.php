<!-- Project Id Field -->

<?php

$projects = App\Models\Adm\Project::all()->pluck('titlees', 'id')

?>
<div class="form-group w-100">
    {!! Form::label('project_id', 'Project Id:') !!}
    {!! Form::select('project_id', $projects) !!}
</div>


{!! Form::file('mainiimage') !!}

<br>
<!-- Mainimage Field -->
<div class="form-group w-100">
    {!! Form::label('titlees', 'Title(Es):') !!}
    {!! Form::text('titlees', null, ['class' => 'form-control']) !!}
</div>
<!-- Mainimage Field -->
<div class="form-group w-100">
    {!! Form::label('titleen', 'Title(En):') !!}
    {!! Form::text('titleen', null, ['class' => 'form-control']) !!}
</div>

<!-- Mainimage Field -->
<div class="form-group w-100">
    {!! Form::label('descriptiones', 'Description(Es):') !!}
    {!! Form::text('descriptiones', null, ['class' => 'form-control']) !!}
</div>
<!-- Mainimage Field -->
<div class="form-group w-100">
    {!! Form::label('descriptionen', 'Description(En):') !!}
    {!! Form::text('descriptionen', null, ['class' => 'form-control']) !!}
</div>