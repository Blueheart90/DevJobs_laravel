<?php

use App\Categoria;
use Illuminate\Database\Seeder;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::create([
            'nombre' => 'Frontend',
        ]);
        Categoria::create([
            'nombre' => 'Backend',
        ]);
        Categoria::create([
            'nombre' => 'Full Stack',
        ]);
        Categoria::create([
            'nombre' => 'DevOps',
        ]);
        Categoria::create([
            'nombre' => 'DBA',
        ]);
        Categoria::create([
            'nombre' => 'UI / UI',
        ]);
        Categoria::create([
            'nombre' => 'TechLead',
        ]);

    }
}
