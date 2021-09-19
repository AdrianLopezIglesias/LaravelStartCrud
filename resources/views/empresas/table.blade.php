<div class="table-responsive">
    <table class="table" id="empresas-table">
        <thead>
            <tr>
                <th>Nombre</th>
        <th>Email</th>
        <th>Logotipo</th>
        <th>Sitioweb</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($empresas as $empresa)
            <tr>
                <td>{{ $empresa->nombre }}</td>
            <td>{{ $empresa->email }}</td>
            <td>{{ $empresa->logotipo }}</td>
            <td>{{ $empresa->sitioweb }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['empresas.destroy', $empresa->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('empresas.show', [$empresa->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('empresas.edit', [$empresa->id]) }}" class='btn btn-default btn-xs'>
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
