<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personas;
use Illuminate\Support\Str;

class PersonasController extends Controller
{
    public function indexPersonas(Request $request)
    {
        $personas = Personas::get();
        return view('personas.index', ['personas' => $personas]);
    }

    public function formPersonas(Request $request)
    {
        $ayudantesBecarios = Personas::where('tipo', '!=', 'ESTUDIANTE')->get();
        return view('personas.form', ['ayudantesBecarios' => $ayudantesBecarios]);
    }

    public function guardarPersonas(Request $request)
    {
        $error = false;
        if ($this->validarCampos($request) == 'bien') {
            $consultaPersonasxIdentificador = Personas::where('identificador', $request['identificador'])->first();
            if ($consultaPersonasxIdentificador) {
                $response['type'] = 'error';
                $response['sms'] = 'Identificador ya se encuentra registrado por: '.$consultaPersonasxIdentificador->nombres.' '.$consultaPersonasxIdentificador->apellidos;
                $error = true;
            }

            if (!$error) {
                $request['nombres'] = strtoupper( $request['nombres'] );
                $request['apellidos'] = strtoupper( $request['apellidos'] );
                $request['codigo'] = Str::random(10);
                Personas::create($request->all());
                $response['type'] = 'success';
                $response['sms'] = 'Persona registrada';
                $response['callBackFunction'] = 'backButton';
            }
        } else {
            $response['type'] = 'error';
            $response['sms'] = 'No se enviaron todos los datos';
        }

        return response()->json($response);
    }

    public function formEditPersonas(Request $request, $id)
    {
        $persona = Personas::find($id);
        $ayudantesBecarios = Personas::where('tipo', '!=', 'ESTUDIANTE')->get();
        return view('personas.form-edit', ['persona' => $persona, 'ayudantesBecarios' => $ayudantesBecarios]);
    }

    public function EditarPersonas(Request $request, $id)
    {
        $error = false;
        if ($this->validarCampos($request) == 'bien') {
            $consultaPersonasxIdentificador = Personas::where('identificador', $request['identificador'])->where('id','!=', $id)->first();
            if ($consultaPersonasxIdentificador) {
                $response['type'] = 'error';
                $response['sms'] = 'Identificador ya se encuentra registrado por: '.$consultaPersonasxIdentificador->nombres.' '.$consultaPersonasxIdentificador->apellidos;
                $error = true;
            }

            if (!$error) {
                $request['nombres'] = strtoupper( $request['nombres'] );
                $request['apellidos'] = strtoupper( $request['apellidos'] );
                $request['codigo'] = Str::random(10);
                Personas::where('id', $id)->update($request->all());
                $response['type'] = 'success';
                $response['sms'] = 'Registro actualizado';
                $response['callBackFunction'] = 'backButton';
            }
        } else {
            $response['type'] = 'error';
            $response['sms'] = 'No se enviaron todos los datos';
        }

        return response()->json($response);
    }

    private function validarCampos($request)
    {
        if ($request['nombres'] && $request['apellidos'] && $request['identificador'] && $request['nacimiento'] && $request['tipo']) {
            return 'bien';
        } else {
            return 'mal';
        }
    }
}
