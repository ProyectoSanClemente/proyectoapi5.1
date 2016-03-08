<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Repositorio extends Model
{
    public $table = "repositorios";    

	public $fillable = [
	    "nombre",
		"descripcion"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "nombre" => "string",
		"descripcion" => "string",
    ];

	public static $rules = [
	    "nombre" => "required",
	];

	public function Documentos()
    {
        return $this->hasMany('App\Models\Documento','id_repositorio');
    }


}
