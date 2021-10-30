<form id="pacientes_buscar">
	<tr>
		<td>Nombre</td>
		<td><input type="text" name="nombre" class="form-control"></td>
	</tr>
	<tr>
		<td>DNI</td>
		<td><input type="text" name="dni" class="form-control"></td>
	</tr>
</form>

<tr>
	<td></td>
	<td>
		<button class="btn btn-outline-secondary w-100" id="load-div-button" data-tgt="#pacientes-table"
			data-attr="/paciente/render" data-form="pacientes_buscar"
			data-opt='{"access": "pacientes", "view": "pacientes_buscar"}'>
			Buscar
		</button>
</tr>