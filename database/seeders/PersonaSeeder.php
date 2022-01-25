<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PersonaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('personas')->insert(array(
            [
                "nombres" => "MERY LAURA",
                "apellidos" => "ALVAREZ BRAVO",
                "identificador" => "1315714749",
                "nacimiento" => "1998-06-17",
                "codigo" => Str::random(10),
                "created_at" => date("Y-m-d H:i:s", time()),
                "updated_at" => date("Y-m-d H:i:s", time()),
                "tipo" => "BECARIO" 
            ],
           [
                "nombres" => "DARWIN",
                "apellidos" => "CONTRERAS",
                "identificador" => "1317161467",
                "nacimiento" => "1996-04-28",
                "codigo" => Str::random(10),
                "created_at" => date("Y-m-d H:i:s", time()),
                "updated_at" => date("Y-m-d H:i:s", time()),
                "tipo" => "ESTUDIANTE" 
            ], 
            [
                "nombres" => "EDGAR",
                "apellidos" => "PICO",
                "identificador" => "1316749925",
                "nacimiento" => "1997-03-14",
                "codigo" => Str::random(10),
                "created_at" => date("Y-m-d H:i:s", time()),
                "updated_at" => date("Y-m-d H:i:s", time()),
                "tipo" => "ESTUDIANTE" 
            ],
            [
                "nombres" => "STEFANIA",
                "apellidos" => "MUÑOZ",
                "identificador" => "1319498485",
                "nacimiento" => "1997-05-05",
                "codigo" => Str::random(10),
                "created_at" => date("Y-m-d H:i:s", time()),
                "updated_at" => date("Y-m-d H:i:s", time()),
                "tipo" => "ESTUDIANTE" 
            ],
            [
                "nombres" => "JAVIER",
                "apellidos" => "VERA",
                "identificador" => "1315884889",
                "nacimiento" => "1997-06-30",
                "codigo" => Str::random(10),
                "created_at" => date("Y-m-d H:i:s", time()),
                "updated_at" => date("Y-m-d H:i:s", time()),
                "tipo" => "ESTUDIANTE" 
            ],
            [
                "nombres" => "CRISTIAN",
                "apellidos" => "BAZURTO",
                "identificador" => "1314240894",
                "nacimiento" => "1993-01-01",
                "codigo" => Str::random(10),
                "created_at" => date("Y-m-d H:i:s", time()),
                "updated_at" => date("Y-m-d H:i:s", time()),
                "tipo" => "ESTUDIANTE" 
            ],
            [
                "nombres" => "LEO",
                "apellidos" => "INTRIAGO",
                "identificador" => "1317889550",
                "nacimiento" => "2001-05-24",
                "codigo" => Str::random(10),
                "created_at" => date("Y-m-d H:i:s", time()),
                "updated_at" => date("Y-m-d H:i:s", time()),
                "tipo" => "BECARIO" 
            ],
        ));
    }
}
