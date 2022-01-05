<div class="row mt-5">
    <div class="col-sm-12 col-md-3 col-lg-3"></div>
    <div class="col-sm-12 col-md-6 col-lg-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">GESTI&Oacute;N DE HORARIOS AYUDANTES / BECARIOS</h5>
                <div class="card-body">
                    <form id="form" name="form" ajax-route="{{route('guardarHorariosAyudantesBecarios', ['id' => $persona->id])}}" action="javascript:void(0);" onsubmit="return postDataAjax($(this));">
                        <span class="badge rounded-pill bg-danger">{{$persona->nombres}} {{$persona->apellidos}} - {{$persona->identificador}}</span>
                        <hr>
                        <input type="hidden" id="token" value="{{ csrf_token() }}" required="true">
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <label for="lunes_inicio" class="form-label">Lunes inicio</label>
                                    <input type="time" class="form-control" id="lunes_inicio" name="lunes_inicio" required="true" value="{{$persona->lunes_inicio}}">
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <label for="lunes_fin" class="form-label">Lunes fin</label>
                                    <input type="time" class="form-control" id="lunes_fin" name="lunes_fin" required="true" value="{{$persona->lunes_fin}}">
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <label for="martes_inicio" class="form-label">Martes inicio</label>
                                    <input type="time" class="form-control" id="martes_inicio" name="martes_inicio" required="true" value="{{$persona->martes_inicio}}">
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <label for="martes_fin" class="form-label">Martes fin</label>
                                    <input type="time" class="form-control" id="martes_fin" name="martes_fin" required="true" value="{{$persona->martes_fin}}">
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <label for="miercoles_inicio" class="form-label">Miercoles inicio</label>
                                    <input type="time" class="form-control" id="miercoles_inicio" name="miercoles_inicio" required="true" value="{{$persona->miercoles_inicio}}">
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <label for="miercoles_fin" class="form-label">Miercoles fin</label>
                                    <input type="time" class="form-control" id="miercoles_fin" name="miercoles_fin" required="true" value="{{$persona->miercoles_fin}}">
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <label for="jueves_inicio" class="form-label">Jueves inicio</label>
                                    <input type="time" class="form-control" id="jueves_inicio" name="jueves_inicio" required="true" value="{{$persona->jueves_inicio}}">
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <label for="jueves_fin" class="form-label">Jueves fin</label>
                                    <input type="time" class="form-control" id="jueves_fin" name="jueves_fin" required="true" value="{{$persona->jueves_fin}}">
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <label for="viernes_inicio" class="form-label">Viernes inicio</label>
                                    <input type="time" class="form-control" id="viernes_inicio" name="viernes_inicio" required="true" value="{{$persona->viernes_inicio}}">
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <label for="viernes_fin" class="form-label">Viernes fin</label>
                                    <input type="time" class="form-control" id="viernes_fin" name="viernes_fin" required="true" value="{{$persona->viernes_fin}}">
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <label for="sabado_inicio" class="form-label">Sabado inicio</label>
                                    <input type="time" class="form-control" id="sabado_inicio" name="sabado_inicio" required="true" value="{{$persona->sabado_inicio}}">
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <label for="sabado_fin" class="form-label">Sabado fin</label>
                                    <input type="time" class="form-control" id="sabado_fin" name="sabado_fin" required="true" value="{{$persona->sabado_fin}}">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-12 col-md-2 col-lg-2">
                                <div class="d-grid gap-2">
                                    <button type="button" class="btn btn-secondary back-btn" ajax-route="{{route('indexHorariosAyudantesBecarios')}}" onclick="loadView($(this));">Atras</button>
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
    <div class="col-sm-12 col-md-3 col-lg-3"></div>
</div>