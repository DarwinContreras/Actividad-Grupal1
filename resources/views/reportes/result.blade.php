<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <table id="tabla-result" class="table stripe">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Nombres</th>
                    <th>Identificador</th>
                    <th>Nacimiento</th>
                    <th>Tipo</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $data)
                    <tr>
                        <td>{{$data->asistencia}}</td>
                        <td>{{$data->getPersona->apellidos}} {{$data->getPersona->nombres}}</td>
                        <td>{{$data->getPersona->identificador}}</td>
                        <td>{{$data->getPersona->nacimiento}}</td>
                        <td>{{$data->getPersona->tipo}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <hr>
    </div>
    <input type="hidden" id="dataChart" value="{{$arrayDataChart}}" >
    <div class="col-sm-12 col-md-12 col-lg-12">
        <h6>N&uacute;mero de asistencias entre fechas</h6>
        <canvas id="pie" style="width:100%; max-height:300px;"></canvas>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-12">
        <h6>N&uacute;mero de asistencias entre fechas</h6>
        <canvas id="line" style="width:100%; max-height:300px;"></canvas>
    </div>


<script>
    $(document).ready(function() {
        $('#tabla-result').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ]
        } );

        var data = JSON.parse($('#dataChart').val());
        var pieCtx = document.getElementById('pie').getContext('2d');
        var pie = new Chart(pieCtx, {
            type: 'pie',
            data: {
                labels: data.labels,
                datasets: [{
                    label: '# de asistencia',
                    data: data.data,
                    backgroundColor: data.backgroundColor,
                    borderColor: data.borderColor,
                    borderWidth: 1
                }]
            },
            hoverOffset: 4,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        var lineCtx = document.getElementById('line').getContext('2d');
        var line = new Chart(lineCtx, {
            type: 'line',
            data: {
                labels: data.labels,
                datasets: [{
                    label: '# de asistencia',
                    data: data.data,
                    backgroundColor: data.backgroundColor,
                    borderColor: data.borderColor,
                    borderWidth: 1
                }]
            },
            hoverOffset: 4,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>