<div class="container">
	<h4>Agendar cita</h4>
	<br>
	<div id="datepicker"></div>
	<br>
	<p>Turnos disponibles: </p>
	<div id="disponibilidad"></div>


</div>

<script>
	$(function() {
        $("#datepicker").datepicker();
    });
    var fecha2 = $("#datepicker").val();

    var output = fecha2.replace(/(\d\d)\/(\d\d)\/(\d{4})/, "$3-$1-$2");

    // $(document).on("change", "#datepicker", function() {
    //     fecha2 = $(this).val();
    //     output = fecha2.replace(/(\d\d)\/(\d\d)\/(\d{4})/, "$3-$1-$2");
    //     $.ajax("/api/citas/disponibilidad/" + output, function(data) {
    //         type: "POST",
    //         console.log(data);
    //         var citas = data;
    //         var opciones = `<select class="form-control" name="agendar-turno">`;
    //         _.forIn(citas, function(value, key) {
    //             if (value['disponibilidad'] == "free") {
    //                 opciones += `<option value="${value.cod_horario}" onclick="agendarTurno(${key})">De las ${value.hora_inicio} a las </option><br>`
    //             }
    //         });
    //         opciones += `</select>`;
    //         $('#disponibilidad').html(opciones);
    //     });
    // })

    $(document).on("change", "#datepicker", function() {
			fecha2 = $(this).val();
			output = fecha2.replace(/(\d\d)\/(\d\d)\/(\d{4})/, "$3-$1-$2");
			let datos = {
					fecha: output,
					tratamiento_duracion: "{{ $contratacion->tratamiento->duracion }}"
			};
			$.ajax({
					type: "POST",
					url: "/api/citas/disponibilidad",
					data: datos,
					headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					beforeSend: function() {
							$('#xx').show();
					},
					success: function(result) {

							var citas = result;
							var opciones = `<select class="form-control" name="agendar-turno">`;
							_.forIn(citas, function(value, key) {
									if (value['disponibilidad'] == "free") {
											opciones += `<option value="${value.cod_horario}" onclick="agendarTurno(${key})">De las ${value.hora_inicio} a las ${value.hora_fin}</option><br>`
									}
							});
							opciones += `</select>`;
							$('#disponibilidad').html(opciones);

					},
					complete: function() {
							$('#xx').hide();
					},
					error: function(jqXHR, testStatus, error) {
							console.log(error);
							$('#xx').hide();
					},
					timeout: 8000
			});
	});

	function agendarTurno(key) {
			let datos = {
					dia: output,
					turno: key,
					contratacion_id: {{ $contratacion->id }},
					tratamiento_id: "{{ $contratacion->tratamiento_id }}",
					paciente_id: "{{ $contratacion->paciente_id }}"
			};
			if (confirm("¿Desea agendar el turno para el día " + $("#datepicker").val() + " a las " + key + " horas?")) {
					$.ajax({
							type: "POST",
							url: "/api/citas",
							data: datos,
							headers: {
									'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
							},
							beforeSend: function() {
									$('#loader').show();
							},
							success: function(result) {
									location.reload();

							},
							complete: function() {
									$('#loader').hide();
							},
							error: function(jqXHR, testStatus, error) {
									console.log(error);
									$('#loader').hide();
							},
							timeout: 8000

					});
			}
	}
</script>