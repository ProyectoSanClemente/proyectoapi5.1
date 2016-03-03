<?php

use Illuminate\Database\Seeder;

class DepartamentosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departamentos=[
    		['nombre' =>'ninguno',
            'created_at' => \Carbon\Carbon::now()->toDateTimeString()
            ],
        ];

        DB::table('departamentos')->insert($departamentos);
    }
}
