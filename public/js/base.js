function loadView(element) {
    let ajaxRoute = $(element).attr('ajax-route');
    if (ajaxRoute) {
        $.ajax({
            url: ajaxRoute,
            type: 'GET',
            success: function(data) {
                $('#contenedor-principal').html(data);
            },
            error: function(errorThrown) {
                swalertError('Error!', errorThrown.responseJSON.message);
            }
        });
    }
}

function postDataAjax(form) {
    let ajaxRoute = $(form).attr('ajax-route');
    var token = $('#token').val();
    Swal.fire({
        title: 'Atención',
        icon: 'question',
        text: '¿Desea aplicar los cambios?',
        showCancelButton: true,
        reverseButtons: true,
        cancelButtonText: 'No, Cancelar',
        confirmButtonText: 'Si!',
    }).then(function(result) {
        if (result.value) {
            $.ajax({
                headers: { 'X-CSRF-TOKEN': token },
                type: "POST",
                url: ajaxRoute,
                datatype: 'json',
                data: $(form).serialize(),
                success: function(data) {
                    if (data.type == 'error')
                        swalertError('Error!', data.sms);

                    if (data.type == 'success')
                        swalertSuccess('Bien!', data.sms);

                    if (data.callBackFunction) {
                        eval(data.callBackFunction)(data);
                    }
                },
                error: function(errorThrown) {
                    swalertError('Error!', errorThrown.responseJSON.message);
                }
            });
        }
    });
}

function swalertInfo(titulo, mensaje) {
    Swal.fire({
        icon: 'info',
        title: titulo,
        text: mensaje
    })
}

function swalertSuccess(titulo, mensaje) {
    Swal.fire({
        icon: 'success',
        title: titulo,
        text: mensaje
    })
}

function swalertError(titulo, mensaje) {
    Swal.fire({
        icon: 'error',
        title: titulo,
        text: mensaje
    })
}

function backButton(data) {
    $('.back-btn').trigger('click');
}

function generarReporte(element) {
    let ajaxRoute = $(form).attr('ajax-route');
    var token = $('#token').val();
    Swal.fire({
        title: 'Atención',
        icon: 'question',
        text: '¿Desea aplicar la búsqueda?',
        showCancelButton: true,
        reverseButtons: true,
        cancelButtonText: 'No, Cancelar',
        confirmButtonText: 'Si!',
    }).then(function(result) {
        if (result.value) {
            $('#result-busqueda').html('');
            $.ajax({
                headers: { 'X-CSRF-TOKEN': token },
                type: "POST",
                url: ajaxRoute,
                datatype: 'json',
                data: $(form).serialize(),
                success: function(data) {
                    $('#result-busqueda').html(data);
                },
                error: function(errorThrown) {
                    swalertError('Error!', errorThrown.responseJSON.message);
                }
            });
        }
    });
}