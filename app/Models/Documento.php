<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    public $table = "documentos";    

	public $fillable = [
	    "nombre",
		"documento",
        "id_repositorio"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "nombre" => "string",
		"documento" => "string",
    ];

	public static $rules = [
	    "nombre" => "required",
        "documento" => "required"
	];

	/*public function Documentos()
    {
        return $this->hasOne('App\Models\Documento','id_tema');
    }
*/

}
