<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategoriasSeeder::class);
        $this->call(UsuariosSeeder::class);
        $this->call(ExperienciaSeeder::class);
        $this->call(UbicacionSeeder::class);
        $this->call(SalarioSeeder::class);
        $this->call(VacantesSeeder::class);
        // $this->call(UsersTableSeeder::class);
    }
}
