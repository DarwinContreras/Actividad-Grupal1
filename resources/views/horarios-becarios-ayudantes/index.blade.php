<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <h5 class="card-title mt-2">HORARIO AYUDANTES / BECARIOS</h5>
                </div>
                <hr>
                <div class="card-body">
                    <table id="tabla-horarios-becarios-ayudantes" class="table stripe">
                        <thead>
                            <tr>
                                <th>C&oacute;digo</th>
                                <th>Nombres</th>
                                <th>Identificador</th>
                                <th>Nacimiento</th>
                                <th>Tipo</th>
                                <th class="text-center">Horarios</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($personas as $persona)
                                <tr>
                                    <td>{{$persona->codigo}}</td>
                                    <td>{{$persona->apellidos}} {{$persona->nombres}}</td>
                                    <td>{{$persona->identificador}}</td>
                                    <td>{{$persona->nacimiento}}</td>
                                    <td>{{$persona->tipo}}</td>
                                    <td class="center">
                                        <center>
                                            <button class="btn btn-primary" ajax-route="{{route('formHorariosAyudantesBecarios', ['id' => $persona->id])}}" onclick="loadView($(this))">Gesti&oacute;n</button>
                                        </center>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="{{asset('js/horarios-becarios-ayudantes/index.js')}}"></script>