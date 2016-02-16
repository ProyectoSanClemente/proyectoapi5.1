<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Impresora extends Model
{
    
	public $table = "impresoras";
    

	public $fillable = [
        "modelo_impresora",
        "accountname",
        "id_usuario"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "accountname" => "string",
		"modelo_impresora" => "string"
    ];
	public static $rules = [
        "accountname" => "required",
		"modelo_impresora" => "required"
	];
}
/*$impresora = Impresora::find(1);*/
