<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    public $table = "documentos";    

	public $fillable = [
	    "nombre",
		"documento",
        "enlace",
        "tipo",
        "id_repositorio"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "nombre" => "string",
    ];

	public static $rules = [
	    "nombre" => "required"
	];

    public function Repositorio()
    {
        return $this->belongsTo('App\Models\Repositorio','id_repositorio');
    }

}
