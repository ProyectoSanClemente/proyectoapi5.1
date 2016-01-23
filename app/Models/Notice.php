<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Notice extends Model
{
    
	public $table = "noticias";
    

	public $fillable = [
	    "titulo",
		"contenido",
		"imagen"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "titulo" => "string",
		"contenido" => "string",
		"imagen" => "string"
    ];

	public static $rules = [
	    "titulo" => "required",
		"contenido" => "required",
	];

}
