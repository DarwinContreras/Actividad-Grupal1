<div class="container-fluid">
    <div class="row mt-5">
        <div class="col-sm-12 col-md-6 col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">GESTI&Oacute;N DE DATOS PERSONALES</h5>
                    <div class="card-body">
                        <form id="form" name="form" ajax-route="{{route('editarPersonas', ['id' => $persona->id])}}" action="javascript:void(0);" onsubmit="return postDataAjax($(this));">
                            <input type="hidden" id="token" value="{{ csrf_token() }}" required="true">
                            <div class="mb-3">
                                <label for="nombres" class="form-label">Nombre(s)</label>
                                <input type="text" class="form-control" id="nombres" name="nombres" required="true" value="{{$persona->nombres}}">
                            </div>
                            <div class="mb-3">
                                <label for="apellidos" class="form-label">Apellidos(s)</label>
                                <input type="text" class="form-control" id="apellidos" name="apellidos" required="true" value="{{$persona->apellidos}}">
                            </div>
                            <div class="mb-3">
                                <label for="identificador" class="form-label">Identificador</label>
                                <input type="text" class="form-control" id="identificador" name="identificador" required="true" value="{{$persona->identificador}}">
                            </div>
                            <div class="mb-3">
                                <label for="nacimiento" class="form-label">F. Nacimiento</label>
                                <input type="date" class="form-control" id="nacimiento" name="nacimiento" required="true" value="{{$persona->nacimiento}}">
                            </div>
                            <div class="mb-3">
                                <label for="tipo" class="form-label">Tipo</label>
                                <select class="form-control" id="tipo" name="tipo" required="true">
                                    <option value="" selected disabled>Seleccione de la lista</option>
                                    <option @if ($persona->tipo == 'AYUDANTE') selected @endif value="AYUDANTE">Ayudante</option>
                                    <option @if ($persona->tipo == 'BECARIO') selected @endif value="BECARIO">Becario</option>
                                    <option @if ($persona->tipo == 'ESTUDIANTE') selected @endif value="ESTUDIANTE">Estudiante</option>
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-2 col-lg-2">
                                    <div class="d-grid gap-2">
                                        <button type="button" class="btn btn-secondary back-btn" ajax-route="{{route('indexPersonas')}}" onclick="loadView($(this));">Atras</button>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-8 col-lg-8"></div>
                                <div class="col-sm-12 col-md-2 col-lg-2">
                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn btn-primary rigth">Guardar</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 @if ($persona->tipo != 'ESTUDIANTE') visually-hidden @endif" id="div_horarios">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">HORARIOS DOCENTES</h5>
                    <div class="card-body">
                        <div class="accordion" id="accordionExample">
                            @foreach ($ayudantesBecarios as $ab)
                            @if ($ab->lunes_inicio)

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading{{$ab->id}}">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$ab->id}}" aria-expanded="false" aria-controls="collapse{{$ab->id}}">
                                        {{$ab->nombres}} {{$ab->apellidos}} - {{$ab->identificador}}
                                    </button>
                                </h2>
                                <div id="collapse{{$ab->id}}" class="accordion-collapse collapse" aria-labelledby="heading{{$ab->id}}" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="mb-1">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-6 col-lg-6">
                                                    <b>Lunes inicio</b><br>
                                                    {{$ab->lunes_inicio}}
                                                </div>
                                                <div class="col-sm-12 col-md-6 col-lg-6">
                                                    <b>Lunes fin</b><br>
                                                    {{$ab->lunes_fin}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-1">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-6 col-lg-6">
                                                    <b>Martes inicio</b><br>
                                                    {{$ab->martes_inicio}}
                                                </div>
                                                <div class="col-sm-12 col-md-6 col-lg-6">
                                                    <b>Martes fin</b><br>
                                                    {{$ab->martes_fin}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-1">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-6 col-lg-6">
                                                    <b>Mi&eacute;rcoles inicio</b><br>
                                                    {{$ab->miercoles_inicio}}
                                                </div>
                                                <div class="col-sm-12 col-md-6 col-lg-6">
                                                    <b>Mi&eacute;rcoles fin</b><br>
                                                    {{$ab->miercoles_fin}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-1">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-6 col-lg-6">
                                                    <b>Jueves inicio</b><br>
                                                    {{$ab->jueves_inicio}}
                                                </div>
                                                <div class="col-sm-12 col-md-6 col-lg-6">
                                                    <b>Jueves fin</b><br>
                                                    {{$ab->jueves_fin}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-1">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-6 col-lg-6">
                                                    <b>Viernes inicio</b><br>
                                                    {{$ab->viernes_inicio}}
                                                </div>
                                                <div class="col-sm-12 col-md-6 col-lg-6">
                                                    <b>Viernes fin</b><br>
                                                    {{$ab->viernes_fin}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-1">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-6 col-lg-6">
                                                    <b>S&aacute;bado inicio</b><br>
                                                    {{$ab->sabado_inicio}}
                                                </div>
                                                <div class="col-sm-12 col-md-6 col-lg-6">
                                                    <b>S&aacute;bado fin</b><br>
                                                    {{$ab->sabado_fin}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{asset('js/personas/form-edit.js')}}"></script>