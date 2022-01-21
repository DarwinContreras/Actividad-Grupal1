<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Personas;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class AsistenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $id_ultimo_ejemplo = Personas::latest('id')->first();

        //establecer la fecha
        $fecha = Carbon::now();
        
        DB::table('asistencia_personas')->insert(array(
            [
                "id_persona" => $id_ultimo_ejemplo['id'],
                "asistencia" => $fecha,
                "created_at" => date("Y-m-d H:i:s", time()),
                "updated_at" => date("Y-m-d H:i:s", time())
            ],
            [ // para ver el grafico mas elavorado en los Reportes
                "id_persona" => $id_ultimo_ejemplo['id']-1,
                "asistencia" => $fecha,
                "created_at" => date("Y-m-d H:i:s", time()),
                "updated_at" => date("Y-m-d H:i:s", time())
            ]
        ));
    }
    
}