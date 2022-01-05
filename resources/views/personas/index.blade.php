<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 col-md-10 col-lg-10">
                        <h5 class="card-title mt-2">PERSONAS</h5>
                    </div>
                    <div class="col-sm-12 col-md-2 col-lg-2">
                        <div class="d-grid gap-2">
                            <button class="btn btn-success" ajax-route="{{route('formPersonas')}}" onclick="loadView($(this));">Nuevo</button>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="card-body">
                    <table id="tabla-personas" class="table stripe">
                        <thead>
                            <tr>
                                <th>C&oacute;digo</th>
                                <th>Nombres</th>
                                <th>Identificador</th>
                                <th>Nacimiento</th>
                                <th>Tipo</th>
                                <th class="text-center">Editar</th>
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
                                            <button class="btn btn-primary" ajax-route="{{route('formEditPersonas', ['id' => $persona->id])}}" onclick="loadView($(this));">Editar</button>
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


<script src="{{asset('js/personas/index.js')}}"></script>