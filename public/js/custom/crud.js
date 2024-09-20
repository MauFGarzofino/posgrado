/*
    Custom CRUD
*/

(function () {

    'use strict';

    /*------------------------------------------
            --------------------------------------------
            Pass Header Token
            --------------------------------------------
       --------------------------------------------*/
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    /*------------------------------------------
        --------------------------------------------
        Render DataTable
        --------------------------------------------
        --------------------------------------------*/
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: URLindex,
        columns: columnas
    });

    /*------------------------------------------
        --------------------------------------------
        Create or Update Record Table Code
        --------------------------------------------
        --------------------------------------------*/
    $('#form').on('submit', function(e) {
        e.preventDefault();

        // Crear una instancia de FormData para manejar el envío de archivos
        var formData = new FormData(this);

        $.ajax({
            data: formData,
            url: URLindex,
            type: "POST",
            dataType: 'json',
            contentType: false,
            processData: false, // Evita que jQuery procese los datos
            success: function (data) {
                $('#form').trigger("reset");
                $('#ajaxModel').modal('hide');
                table.draw();
            },
            error: function (data) {
                $('.is-invalid').removeClass('is-invalid');
                $('.invalid-feedback').remove();
                console.log('Error:', data);

                // Si hay errores en la respuesta JSON
                if (data.responseJSON && data.responseJSON.errors) {
                    var errors = data.responseJSON.errors;

                    $.each(errors, function (key, value) {
                        var input = $('input[name=' + key + ']');
                        input.addClass('is-invalid');
                        input.after('<div class="invalid-feedback">' + value[0] + '</div>');
                    });
                } else {
                    // error genérico
                    $('#formError').text('Hubo un error al procesar el formulario. Inténtalo de nuevo.');
                }
            }
        });
    });

    /*------------------------------------------
        --------------------------------------------
        Click to Button
        --------------------------------------------
    --------------------------------------------*/
    $('#createNewRecord').on("click", function () {
        $('#table_id').val('');
        //$('#form').trigger("reset");
        $('#form')[0].reset()
        $('#modelHeading').html("Crear nueva "+titulo);
        $('#ajaxModel').modal('show');
    });

    /*------------------------------------------
        --------------------------------------------
        Click to Edit Button
        --------------------------------------------
    --------------------------------------------*/
    $('body').on('click', '.editRecord', function () {
        var table_id = $(this).data('id');
        $.get(URLindex +'/'+ table_id +'/edit', function (data) {
            $('#modelHeading').html("Editar "+titulo);
            $('#ajaxModel').modal('show');
            $('#table_id').val(data.id);

            $.each(data, function (index, itemData) {
                $('[name="'+index+'"]').val(itemData);
            });
        })
    });

    /*------------------------------------------
        --------------------------------------------
        Delete Record Table Code
        --------------------------------------------
        --------------------------------------------*/
    $('body').on('click', '.deleteRecord', function () {

        var table_id = $(this).data("id");
        let sino = confirm("Confirma borrar el registro?");
        if(sino){
            $.ajax({
                type: "DELETE",
                url: URLindex + '/'+table_id,
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content') // Agregamos el token CSRF manualmente
                },
                success: function (data) {
                    table.draw();
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        }
    });

})();
