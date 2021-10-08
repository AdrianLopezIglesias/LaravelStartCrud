<?php
$tratamiento = App\Models\Tratamiento::get()->pluck('nombre', 'id');
$pacientes = App\Models\Pacientes::all()->pluck('nombre', 'id');
?>
<div class="container">
    <table class="table">
        <tbody>
            <tr></tr>
            <td>Tratamiento</td>
            <td>{!! Form::select('tratamiento_id', $tratamiento, null, ['class' => 'form-control']) !!}</td>
            </tr>
            <tr>
                <td>Valor del tratamiento</td>
                <td id="valor_tratamiento"></td>
            </tr>
            </tr>
            <tr>
                <td>Profesional</td>
                <td>Adrian Lopez Iglesias</td>
            </tr>
            </tr>
            <tr>
                <td>Cantidad de sesiones tratamiento</td>
                <td id="cantidad_sesiones"></td>
            </tr>
            <tr>
                <td>Duración de las sesiones</td>
                <td id="duracion"></td>
            </tr>
            <tr>
                <td>Paciente</td>
                <td>
                    @if(isset($paciente))
                    @php
                        $paciente = App\Models\Pacientes::find($paciente);
                    @endphp
                    {{$paciente->nombre}}
                    <input type="hidden" name="paciente_id" value="{{$paciente->id}}">
                    @else
                    {!! Form::select('paciente_id', $pacientes, null, ['class' => 'form-control']) !!}
                    @endif
                </td>

            </tr>
            <tr>
                <td>Valor pagado</td>
                <td>{!! Form::text('valor_pagado', null, ['class' => 'form-control', 'id' => 'tratamiento_id']) !!}</td>
            </tr>
        </tbody>
    </table>

    <script>
        $("[name='tratamiento_id']").change(function() {




            var tratamiento_id = $(this).val();
            console.log(tratamiento_id)
            $.ajax({
                type: "GET"
                , url: '/api/tratamientos/' + tratamiento_id
                , data: {
                    tratamiento_id: tratamiento_id
                }
                , headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                , beforeSend: function() {}
                , success: function(result) {
                    console.log(result);
                    $('#valor_tratamiento').html(result.data.valor)
                    $('#cantidad_sesiones').html(result.data.sesiones)
                    $('#profesional').html(result.data.profesional)
                    $('#duracion').html(result.data.duracion+ " minutos")




                }
                , complete: function() {}
                , error: function(jqXHR, testStatus, error) {}
                , timeout: 8000

            });

        });

    </script>
