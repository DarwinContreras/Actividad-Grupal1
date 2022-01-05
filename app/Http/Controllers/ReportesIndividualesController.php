<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personas;
use App\Models\AsistenciaPersonas;
use Carbon\Carbon;
use DB;

class ReportesIndividualesController extends Controller
{
    public function indexReportesIndividuales(Request $request)
    {
        $personas = Personas::where('tipo', 'ESTUDIANTE')->get();
        $fecha = Carbon::now()->format('Y-m-d');
        return view('reportes-individuales.index', ['fecha' => $fecha,  'personas' => $personas]);
    }

    public function buscarReportesIndividuales(Request $request)
    {   
        $fecha = Carbon::now();
        $anio = $fecha->year;
        
        $data = AsistenciaPersonas::where('id_persona', $request['id_persona'])->get();

        $arrayNombres = ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];
        $arrayData = array();
        $arrayColor = array();
        
        for ($i=0; $i < 12 ; $i++) { 
            if (strlen($i) == 1 && (($i+1) < 10) ) { $mes = '0'.($i+1); } else { $mes = ($i+1); }
            $dataPersona = AsistenciaPersonas::where('id_persona', $request['id_persona'])->where('asistencia', 'like', $anio.'-'.$mes.'-%')->get();
            array_push($arrayData, count($dataPersona));
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

        return view('reportes-individuales.result', ['data' => $data, 'arrayDataChart' => json_encode($arrayDataChart)]);
    }
}
