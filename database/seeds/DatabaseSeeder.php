<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->call(DepartamentosTableSeeder::class);
        $this->call(UsuariosTableSeeder::class);
        $this->call(SistemasTableSeeder::class);
        $this->call(AnexosTableSeeder::class);

        Model::reguard();
    }
}
