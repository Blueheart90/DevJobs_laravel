<?php

use App\Ubicacion;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UbicacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ubicaciones = [
            [
                'nombre' => 'Remoto',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nombre' => 'Canada',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nombre' => 'México',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nombre' => 'Usa',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()

            ],
            [
                'nombre' => 'Argentina',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nombre' => 'Colombia',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nombre' => 'Panamá',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nombre' => 'Holanda',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nombre' => 'Alemania',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ];

        // acepta varios arrays, pero no actualiza fechas de forma automatica
        Ubicacion::insert($ubicaciones);


    }
}
