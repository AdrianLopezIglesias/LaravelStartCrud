@include('adminlte-templates::common.errors')


{!! Form::open(['route' => 'contratacions.store']) !!}


<div class="row">
    @include('contratacions.fields')
    <div class="w-100  text-center">
        {!! Form::submit('Contratar', ['class' => 'btn btn-primary']) !!}
        <a href="{{ route('contratacions.index') }}" class="btn btn-default">
            Cancelar
        </a>
    </div>
    {!! Form::close() !!}
</div>



</div>
