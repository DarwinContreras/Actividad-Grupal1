$(document).ready(function() {
    $('#tabla-asistencia-personas').DataTable();
});

function marcarAsistencia(object) {
    let ajaxRoute = $(object).attr('ajax-route');
    Swal.fire({
        title: '<strong>Atención</strong>',
        icon: 'warning',
        text: '¿Desea registrar la asistencia?',
        showCancelButton: true,
        reverseButtons: true,
        cancelButtonText: 'No, Cancelar',
        confirmButtonText: 'Si!',
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: ajaxRoute,
                type: "get",
                dataType: "json",
                processData: false,
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