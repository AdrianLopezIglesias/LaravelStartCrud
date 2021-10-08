<script>
    // display a modal (medium modal)
    $(document).on('click', '#modal-open-button', function(event) {
        event.preventDefault();
        let href = $(this).attr('data-attr');
        let datos = JSON.parse($(this).attr('data-opt'));
        $.ajax({
            type: "POST"
            , url: href
            , data: datos
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

</script>
