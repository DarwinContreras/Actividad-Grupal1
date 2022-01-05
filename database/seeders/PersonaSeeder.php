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
                "nombres" => "LEO EJEMPLO",
                "apellidos" => "INTRIAGO EJEMPLO",
                "identificador" => "11111111",
                "nacimiento" => "1999-07-18",
                "codigo" => Str::random(10),
                "created_at" => date("Y-m-d H:i:s", time()),
                "updated_at" => date("Y-m-d H:i:s", time()),
                "tipo" => "BECARIO" 
            ]
        ));
    }
}
