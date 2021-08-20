<div class="table-responsive">
    <table class="table" id="iMEIS-table">
        <thead>
            <tr>
                <th>Caso Numero</th>
        <th>Fecha Mail</th>
        <th>Asunto Mail</th>
        <th>Fecha Novedad</th>
        <th>Num Envio</th>
        <th>Lugar</th>
        <th>Motivo</th>
        <th>Marca Modelo</th>
        <th>Imei</th>
        <th>Fecha Pedido</th>
        <th>Compania</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($iMEIS as $iMEI)
            <tr>
                <td>{{ $iMEI->caso_numero }}</td>
            <td>{{ $iMEI->fecha_mail }}</td>
            <td>{{ $iMEI->asunto_mail }}</td>
            <td>{{ $iMEI->fecha_novedad }}</td>
            <td>{{ $iMEI->num_envio }}</td>
            <td>{{ $iMEI->LUGAR }}</td>
            <td>{{ $iMEI->MOTIVO }}</td>
            <td>{{ $iMEI->marca_modelo }}</td>
            <td>{{ $iMEI->IMEI }}</td>
            <td>{{ $iMEI->fecha_pedido }}</td>
            <td>{{ $iMEI->compania }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['iMEIS.destroy', $iMEI->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('iMEIS.show', [$iMEI->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('iMEIS.edit', [$iMEI->id]) }}" class='btn btn-default btn-xs'>
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
