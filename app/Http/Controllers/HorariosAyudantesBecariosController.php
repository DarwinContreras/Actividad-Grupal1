<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personas;

class HorariosAyudantesBecariosController extends Controller
{
    public function indexHorariosAyudantesBecarios(Request $request)
    {
        $personas = Personas::where('tipo', '!=', 'ESTUDIANTE')->get();
        return view('horarios-becarios-ayudantes.index', ['personas' => $personas]);
    }

    public function formHorariosAyudantesBecarios(Request $request, $id)
    {
        $persona = Personas::find($id);
        return view('horarios-becarios-ayudantes.form', ['persona' => $persona]);
    }
    
    public function guardarHorariosAyudantesBecarios(Request $request, $id)
    {
        $error = false;
        if ($this->validarCampos($request) == 'bien') {
            if (!$error) {
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
        if ($request['lunes_inicio'] && $request['lunes_fin'] && $request['martes_inicio'] && $request['martes_fin'] && $request['miercoles_inicio'] && $request['miercoles_fin'] && $request['jueves_inicio'] && $request['jueves_fin'] && $request['viernes_inicio'] && $request['viernes_fin'] && $request['sabado_inicio'] && $request['sabado_fin']) {
            return 'bien';
        } else {
            return 'mal';
        }
    }
}
