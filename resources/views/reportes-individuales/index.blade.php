<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <h5 class="card-title mt-4">REPORTES INDIVIDUALES</h5>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <form id="form" name="form" ajax-route="{{route('buscarReportesIndividuales')}}" action="javascript:void(0);" onsubmit="return generarReporte($(this));">
                            <input type="hidden" id="token" value="{{ csrf_token() }}" required="true">
                            <div class="row">
                                <div class="col-sm-12 col-md-10 col-lg-10">
                                    <label for="id_persona" class="form-label">Persona</label>
                                    <select name="id_persona" id="id_persona" class="form-control" required="true">
                                        <option value="" selected disabled>Seleccione de la lista</option>
                                        @foreach ($personas as $persona)
                                        <option value="{{$persona->id}}">{{$persona->nombres}} {{$persona->apellidos}} - {{$persona->identificador}}</option>
                                        @endforeach    
                                    </select>
                                </div>
                                <div class="col-sm-12 col-md-2 col-lg-2">
                                    <label for="hasta" class="form-label">Buscar</label>
                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn btn-primary rigth"><span class="material-icons md-15">search</span></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <hr>
                <div class="card-body" id="result-busqueda">
                    {{--  --}}
                </div>
            </div>
        </div>
    </div>
</div>


<script src="{{asset('js/reportes-individuales/index.js')}}"></script>