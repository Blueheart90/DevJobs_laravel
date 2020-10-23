<?php

use App\Salario;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SalarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $salarios = [
            [
                'nombre' => '0 - 1000 USD',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nombre' => '1000 - 1500 USD',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nombre' => '2000 - 2500 USD',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nombre' => '3000 - 3500 USD',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()

            ],
            [
                'nombre' => '3000 - 4000 USD',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nombre' => 'Mas de 4000 USD',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nombre' => 'No Mostrar',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];

        // acepta varios arrays, pero no actualiza fechas de forma automatica
        Salario::insert($salarios);
    }
}
