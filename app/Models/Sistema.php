<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Sistema extends Model
{
    
	public $table = "sistemas";
    

	public $fillable = [
	    "nombre_sistema",
		"imagen_sistema",
		"redireccionar"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "nombre_sistema" => "string",
		"imagen_sistema" => "string",
		"redireccionar" => "string"
    ];

	public static $rules = [
	    "nombre_sistema" => "required",
		"imagen_sistema" => "required",
		"redireccionar" => "required"
	];

}
