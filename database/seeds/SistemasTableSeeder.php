<?php

use Illuminate\Database\Seeder;

class SistemasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$sistemas=[
    		['nombre_sistema' =>'Sidam',
            'imagen_sistema' => 'images/sistemas/Sidam.jpg',            
            'controlador' => 'cuentas',
            'funcion' => 'sidam',
            'created_at' => \Carbon\Carbon::now()->toDateTimeString()
            ],
            ['nombre_sistema' =>'Impresoras',
            'imagen_sistema' => 'images/sistemas/Impresoras.jpg',            
            'controlador' => 'impresoras',
            'funcion' => 'imprimir',
            'created_at' => \Carbon\Carbon::now()->toDateTimeString()
            ],
            ['nombre_sistema' =>'Crecic',
            'imagen_sistema' => 'images/sistemas/Crecic.jpg',            
            'controlador' => 'cuentas',
            'funcion' => 'crecic',
            'created_at' => \Carbon\Carbon::now()->toDateTimeString()
            ],
            ['nombre_sistema' =>'Nube',
            'imagen_sistema' => 'images/sistemas/Nube.jpg',            
            'controlador' => 'cuentas',
            'funcion' => 'owncloud',
            'created_at' => \Carbon\Carbon::now()->toDateTimeString()
            ],
            ['nombre_sistema' =>'Zimbra',
            'imagen_sistema' => 'images/sistemas/Zimbra.jpg',            
            'controlador' => 'cuentas',
            'funcion' => 'zimbra',
            'created_at' => \Carbon\Carbon::now()->toDateTimeString()
            ],
            ['nombre_sistema' =>'Solicitud de Compras',
            'imagen_sistema' => 'images/sistemas/Solicitud de Compras.jpg',            
            'controlador' => 'cuentas',
            'funcion' => 'solicitudcompras',
            'created_at' => \Carbon\Carbon::now()->toDateTimeString()
            ],
            ['nombre_sistema' =>'Boleta',
            'imagen_sistema' => 'images/sistemas/Boleta.jpg',            
            'controlador' => 'cuentas',
            'funcion' => 'boleta',
            'created_at' => \Carbon\Carbon::now()->toDateTimeString()
            ],
            ['nombre_sistema' =>'Garantia',
            'imagen_sistema' => 'images/sistemas/Garantia.jpg',            
            'controlador' => 'cuentas',
            'funcion' => 'garantia',
            'created_at' => \Carbon\Carbon::now()->toDateTimeString()
            ],
            ['nombre_sistema' =>'Bodega',
            'imagen_sistema' => 'images/sistemas/Bodega.jpg',            
            'controlador' => 'cuentas',
            'funcion' => 'bodega',
            'created_at' => \Carbon\Carbon::now()->toDateTimeString()
            ],
            ['nombre_sistema' =>'Social',
            'imagen_sistema' => 'images/sistemas/Social.jpg',            
            'controlador' => 'cuentas',
            'funcion' => 'social',
            'created_at' => \Carbon\Carbon::now()->toDateTimeString()
            ],
            ['nombre_sistema' =>'Plan',
            'imagen_sistema' => 'images/sistemas/Plan.jpg',            
            'controlador' => 'cuentas',
            'funcion' => 'plan',
            'created_at' => \Carbon\Carbon::now()->toDateTimeString()
            ],
            ['nombre_sistema' =>'ProcessMaker',
            'imagen_sistema' => 'images/sistemas/ProcessMaker.jpg',            
            'controlador' => 'cuentas',
            'funcion' => 'processmaker',
            'created_at' => \Carbon\Carbon::now()->toDateTimeString()
            ],
        ];

        DB::table('sistemas')->insert($sistemas);
    }
}
