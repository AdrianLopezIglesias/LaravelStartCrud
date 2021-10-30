<div class="table-responsive">
    <table class="table" id="instalacions-table">
        <thead>
            <tr>
                <th>Nombre</th>
        <th>Descripcion</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($instalacions as $instalacion)
            <tr>
                <td>{{ $instalacion->nombre }}</td>
            <td>{{ $instalacion->descripcion }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['instalacions.destroy', $instalacion->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('instalacions.show', [$instalacion->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('instalacions.edit', [$instalacion->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
