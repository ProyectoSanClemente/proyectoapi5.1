<?php

use Illuminate\Database\Seeder;

class UsuariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuarios')->insert([
        	'accountname' =>'intranetadmin',
            'rol' => 'admin',
            'nombre' => 'Intranetadmin',
            'apellido' => 'Local',
            'imagen' => 'images/avatar/default.png',
            'id_departamento'=> '1',
            'password' => bcrypt('12345'),
        ]);
    }
}