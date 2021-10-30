
<input type="hidden" value="{{$salonHorario->id}}" name="id">
<table class="table">
<tbody>
<tr></tr>
	<td>{!! Form::label('hora_inicio', 'Hora Inicio:') !!}</td>
	<td>
		<select name="hora_inicio" class="form-control">
			@foreach (App\Helpers\TimeHelper::getTimeBlock() as $time)
				<option value="{{$time['cod_horario']*5}}" 
					@if ($time['cod_horario']*5 == $salonHorario->hora_inicio) selected @endif>
					{{$time['hora_inicio']}}</option>
			@endforeach
		</select>
</tr>
<tr>
	<td>{!! Form::label('hora_fin', 'Hora Fin:') !!}</td>
	<td>
		<select name="hora_fin" class="form-control">
			@foreach (App\Helpers\TimeHelper::getTimeBlock() as $time)
				<option value="{{$time['cod_horario']*5}}" 
					@if ($time['cod_horario']*5 == $salonHorario->hora_fin) selected @endif>
					{{$time['hora_inicio']}}</option>
			@endforeach
		</select>
	</td>
</tr>
<tr>
	<td>Abierto</td>
	<td><select name="abierto" class="form-control">
		<option value="Si">Si</option>
		<option value="No">No</option>
	</select></td>
</tr>
	
</tbody>

</table>

