<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AsistenciaPersonas;
use Carbon\Carbon;
use DB;

class ReportesController extends Controller
{
    public function indexReportes(Request $request)
    {
        $fecha = Carbon::now()->format('Y-m-d');
        return view('reportes.index', ['fecha' => $fecha]);
    }

    public function buscarReportes(Request $request)
    {
        
        $data = AsistenciaPersonas::whereBetween('asistencia', array($request['desde'].' 00:00:01', $request['hasta'].' 23:59:59'))->get();

        $dataChart = $data->groupBy('id_persona');
        $arrayNombres = array();
        $arrayData = array();
        $arrayColor = array();
        foreach ($dataChart as $key) {
            array_push($arrayNombres, $key[0]->getPersona->nombres.' '.$key[0]->getPersona->apellidos);
            array_push($arrayData, count($key));
            $color = 'rgba('.strval(mt_rand( 128, 255 ).', '.mt_rand( 128, 255 ).', '.mt_rand( 128, 255 )).', 1)';
            array_push($arrayColor, $color);
        }

        $arrayDataChart = [
            'labels' => $arrayNombres,
            'data' => $arrayData,
            'backgroundColor' => $arrayColor,
            'borderColor' => $arrayColor,
            'borderWidth' => 1,
        ];

        return view('reportes.result', ['data' => $data, 'arrayDataChart' => json_encode($arrayDataChart)]);
    }
}
