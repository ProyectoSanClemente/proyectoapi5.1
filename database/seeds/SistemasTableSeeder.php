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
            'funcion' => 'sidam'
            ],
            ['nombre_sistema' =>'Impresoras',
            'imagen_sistema' => 'images/sistemas/Impresora.jpg',            
            'controlador' => 'impresoras',
            'funcion' => 'imprimir'
            ],
            ['nombre_sistema' =>'Crecic',
            'imagen_sistema' => 'images/sistemas/Crecic.jpg',            
            'controlador' => 'cuentas',
            'funcion' => 'crecic'
            ],
            ['nombre_sistema' =>'Nube',
            'imagen_sistema' => 'images/sistemas/Nube.jpg',            
            'controlador' => 'cuentas',
            'funcion' => 'owncloud'
            ],
            ['nombre_sistema' =>'Zimbra',
            'imagen_sistema' => 'images/sistemas/Zimbra.jpg',            
            'controlador' => 'cuentas',
            'funcion' => 'zimbra'
            ]
            ,
            ['nombre_sistema' =>'Solicitud de Compras',
            'imagen_sistema' => 'images/sistemas/Solicitud de Compras.jpg',            
            'controlador' => 'cuentas',
            'funcion' => 'solicitudcompras'
            ],
        ];

        DB::table('sistemas')->insert($sistemas);
    }
}