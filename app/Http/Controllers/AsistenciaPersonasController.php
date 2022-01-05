<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personas;
use App\Models\AsistenciaPersonas;
use Carbon\Carbon;

class AsistenciaPersonasController extends Controller
{
    public function indexAsistenciaPersonas(Request $request)
    {
        $personas = Personas::where('tipo', 'ESTUDIANTE')->get();
        return view('asistencia-personas.index', ['personas' => $personas]);
    }

    public function registroAsistenciaPersonas(Request $request, $id_persona) {
        $error = false;
        if ($id_persona) {
            if (!$error) {
                $request['id_persona'] = $id_persona;
                $request['asistencia'] = Carbon::now();
                AsistenciaPersonas::create($request->all());
                $response['type'] = 'success';
                $response['sms'] = 'Asistencia registrada';
            }
        } else {
            $response['type'] = 'error';
            $response['sms'] = 'No se enviaron todos los datos';
        }

        return response()->json($response);
    }
}
