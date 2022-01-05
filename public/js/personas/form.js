$(document).ready(function() {
    $("#tipo").change(function() {
        var element = document.getElementById('div_horarios');
        let tipo = $(this).val();
        if (tipo == 'ESTUDIANTE') {
            element.classList.remove('visually-hidden');
        } else {
            element.classList.add('visually-hidden');
        }
    });
});