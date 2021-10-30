<script>
  // display a modal (medium modal)
  $(document).on('click', '#modal-open-button', function(event) {
    event.preventDefault();
    let href  = $(this).attr('data-attr');
    let datos = JSON.parse($(this).attr('data-opt'));
    $.ajax({
        type   : "POST"
      , url    : href
      , data   : datos
      , headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
      , beforeSend: function() {
        $('#loader').show();
      }
      , success: function(result) {
        $('#mediumModal').modal("show");
        $('#mediumBody').html(result).show();
      }
      , complete: function() {
        $('#loader').hide();
      }
      , error: function(jqXHR, testStatus, error) {
        console.log(error);
        alert("Page " + href + " cannot open. Error:" + error);
        $('#loader').hide();
      }
      , timeout: 8000
    });
  });


//LOAD DIV
$(document).on('click', '#load-div-button', function(event) {
    event.preventDefault();
    let href   = $(this).attr('data-attr');
    let target = $(this).attr('data-tgt')
    let datos  = JSON.parse($(this).attr('data-opt'));
		if($(this).attr('data-form')){
			datos.form = $("#"+$(this).attr('data-form')).serialize();
		}
		console.log(datos);

    $.ajax({
        type   : "POST"
      , url    : href
      , data   : datos
      , headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
      , beforeSend: function() {
        $('#loader').show();
      }
      , success: function(result) {
				// console.log(result);
        $(target).html(result).show();
        $('#mediumModal').modal("hide");
      }
      , complete: function() {
        $('#loader').hide();
      }
      , error: function(jqXHR, testStatus, error) {
        console.log(error);
        alert("Page " + href + " cannot open. Error:" + error);
        $('#loader').hide();
      }
      , timeout: 8000
    });
  });

// //SUBMIT FORM
// $(document).on('click', '#form-submit-button', function(event) {
//     event.preventDefault();
//     let href = $(this).attr('data-attr');
// 		let target = $(this).attr('data-tgt')
//     let datos = JSON.parse($(this).attr('data-opt'));
// 		console.log(datos);
//     $.ajax({
//       type: "POST"
//       , url: href
//       , data: datos
//       , headers: {
//         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//       }
//       , beforeSend: function() {
//         $('#loader').show();
//       }
//       , success: function(result) {
// 				// console.log(result);
//         $(target).html(result).show();
//       }
//       , complete: function() {
//         $('#loader').hide();
//       }
//       , error: function(jqXHR, testStatus, error) {
//         console.log(error);
//         alert("Page " + href + " cannot open. Error:" + error);
//         $('#loader').hide();
//       }
//       , timeout: 8000
//     });
//   });


	//COLLAPSE NAVBAR
	$('.navbar-nav>li>a').on('click', function(){
    $('.navbar-collapse').collapse('hide');
});
</script>
