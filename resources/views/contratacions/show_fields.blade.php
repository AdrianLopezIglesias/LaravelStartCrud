<table class="table striped hover">
    <thead>
    </thead>
    <tbody>
        <!-- <tr>
      <td> {!! Form::label('created_at', 'Created At:') !!}</td>
      <td>{{ $contratacion->created_at }}</td>
    </tr>

    <tr>
      <td>{!! Form::label('updated_at', 'Updated At:') !!}</td>
      <td>{{ $contratacion->updated_at }}</td>
    </tr> -->

        <tr>
            <td>
                {!! Form::label('tratamiento_id', 'Tratamiento:') !!}
            </td>
            <td>
                {{ $contratacion->tratamiento->nombre }}
            </td>
        </tr>

        <tr>
            <td>
                {!! Form::label('paciente_id', 'Paciente:') !!}
            </td>
            <td>
                {{ $contratacion->paciente->nombre }}
            </td>
        </tr>




        <tr>
            <td>
                <strong>Valor del tratamiento</strong>
            </td>
            <td>
                $ {{ $contratacion->tratamiento->valor }}
            </td>
        </tr>



        <tr>
            <td>
                {!! Form::label('valor_pagado', 'Valor Pagado:') !!}
            </td>
            <td>
                ${{ $contratacion->valor_pagado }}
            </td>
        </tr>
        <tr>
            <td>Sesiones totales
            </td>
            <td>
                {{ $contratacion->tratamiento->sesiones }}
            </td>
        </tr>

        <tr>
            <td>Sesiones agendadas
            </td>
            <td> {{ count($contratacion->citas) }}
            </td>
        </tr>

        <tr>
            <td>Sesiones pendientes
            </td>
            <td> {{ $contratacion->tratamiento->sesiones - count($contratacion->citas) }}
            </td>
        </tr>
        <tr>
            <td>Duración de las sesiones
            </td>
            <td> {{ $contratacion->tratamiento->duracion }}
            </td>
        </tr>

    </tbody>
</table>

</head>

<body>


   
