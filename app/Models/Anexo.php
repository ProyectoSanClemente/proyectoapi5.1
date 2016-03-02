<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Anexo extends Model
{
    
	public $table = "anexos";
    

	public $fillable = [
	    "nombre",
		"numero"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "nombre" => "string",
		"numero" => "integer",
    ];

	public static $rules = [
	    "nombre" => "required",
	    "numero" => "required"
	];

}
