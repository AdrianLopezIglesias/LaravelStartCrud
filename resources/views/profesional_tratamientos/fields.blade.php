<input type="hidden" value="{{$profesional->id}}" name="profesional_id">
<table class="table">
<tbody>
	<tr>
		<td>Tratamiento</td>
		<td>
			<select name="tratamiento_id" class="form-control">
				@foreach (App\Models\Tratamiento::all() as $tratamiento)
					<option value="{{$tratamiento->id}}" >
												{{$tratamiento->nombre}}</option>
				@endforeach
			</select>
	</tr>

	
</tbody>

</table>

