//===========================================================================
////===============================PREVENT FORMS SUBMITED BY ENTER===========
//===========================================================================
$(document).ready(function () {
	$(window).keydown(function (event) {
		if (event.keyCode == 13) {
			event.preventDefault();
			return false;
		}
	});
});

//===========================================================================
//===============================HANDLE ACTION===============================
//===========================================================================
$(document).on('click', '.action_handler', function (event) {
	//===============================PREPARACION===============================
	event.preventDefault();
	console.log("recibido");
	let b, url, target, datos; 

	//===============================DEFINICIONES===============================
	b = $(this);
	
	parameters = JSON.parse(b.attr('parameters'))
	console.log(parameters);
	
	if (b.attr('form')) {
		parameters.form = $("#" + b.attr('form')).serialize();
		console.log(parameters.form); 
	}

	//===============================¿MODAL?===============================
	if (parameters.target == "modal_medium") {
		$('#mediumModal').modal('show')
		parameters.target = 'modal_body'
	}


	//===============================AJAX===============================
	$.ajax({
		type      : "POST",
		url       : parameters.url,
		data      : parameters,
		headers   : { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		beforeSend: function () {
			$('#'+parameters.target).html("cargando...");
		},
		success: function (result) {
			$('#' + parameters.target).html(result);
		},
		complete: function () {
		},
		error: function (jqXHR, testStatus, error) {
			console.log(error);
			$('#'+parameters.target).html("ocurrio un error al procesar la solicitud...");
		},
		timeout: 8000
	});
});


//===========================================================================
//===============================MODAL CLOSER===============================
//===========================================================================
$(document).on('click', '.close_modal', function (event) {
	$('#mediumModal').modal('hide');
});