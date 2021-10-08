<div class="table-responsive">
    <table class="table" id="citas-table">
        <thead>
            <tr>
                <th>Tratamiento</th>
                @if(!isset($view))
                <th>Paciente</th>
                @endif

                <th>Dia</th>
                <th>Horario</th>
            </tr>
        </thead>
        <tbody>
            @foreach($citas as $cita)
            <tr>
                <td>{{ $cita->tratamiento->nombre }}</td>
            @if(!isset($view))
                <td>
                    <a href="/pacientes/{{$cita->paciente->id}}">
                        {{ $cita->paciente->nombre }}
                    </a>
                </td>
                @endif
                <td>{{ $cita->dia->format("l d/m/Y") }}</td>


                <td>{{ $cita->turno }}</td>


            </tr>
            @endforeach
        </tbody>
    </table>
</div>
