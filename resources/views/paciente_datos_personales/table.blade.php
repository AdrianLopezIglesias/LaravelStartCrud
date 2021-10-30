<div class="table-responsive">
    <table class="table" id="pacienteDatosPersonales-table">
        <thead>
            <tr>
                <th>Dni</th>
        <th>Fecha Nacimiento</th>
        <th>Domicilio</th>
        <th>Telefono Principal</th>
        <th>Telefono Emergencias</th>
        <th>Genero</th>
        <th>Pacientes Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($pacienteDatosPersonales as $pacienteDatosPersonales)
            <tr>
                <td>{{ $pacienteDatosPersonales->dni }}</td>
            <td>{{ $pacienteDatosPersonales->fecha_nacimiento }}</td>
            <td>{{ $pacienteDatosPersonales->domicilio }}</td>
            <td>{{ $pacienteDatosPersonales->telefono_principal }}</td>
            <td>{{ $pacienteDatosPersonales->telefono_emergencias }}</td>
            <td>{{ $pacienteDatosPersonales->genero }}</td>
            <td>{{ $pacienteDatosPersonales->pacientes_id }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['pacienteDatosPersonales.destroy', $pacienteDatosPersonales->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('pacienteDatosPersonales.show', [$pacienteDatosPersonales->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('pacienteDatosPersonales.edit', [$pacienteDatosPersonales->id]) }}" class='btn btn-default btn-xs'>
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
