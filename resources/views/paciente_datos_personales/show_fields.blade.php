@include('paciente_datos_personales.admin')
<table class="table">
	<tbody>
		<tr>
			<td>DNI</td>
			<td>{{ $pacienteDatosPersonales->dni }}</td>
		</tr>
		<tr>
			<td>{!! Form::label('fecha_nacimiento', 'Fecha Nacimiento:') !!}</td>
			<td>{{ $pacienteDatosPersonales->fecha_nacimiento }}</td>
		</tr>
		<tr>
			<td>
				{!! Form::label('domicilio', 'Domicilio:') !!}
			</td>
			<td>
				{{ $pacienteDatosPersonales->domicilio }}
			</td>
		</tr>
		<tr>
			<td>
				{!! Form::label('telefono_principal', 'Telefono Principal:') !!}
			</td>
			<td>
				{{ $pacienteDatosPersonales->telefono_principal }}
			</td>
		</tr>
		<tr>
			<td>
				{!! Form::label('telefono_emergencias', 'Telefono Emergencias:') !!}
			</td>
			<td>
				{{ $pacienteDatosPersonales->telefono_emergencias }}
			</td>
		</tr>

		<tr>
			<td>
				{!! Form::label('genero', 'Genero:') !!}
			</td>
			<td>
				{{ $pacienteDatosPersonales->genero }}
			</td>
		</tr>

	</tbody>

</table>