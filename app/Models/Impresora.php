<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Impresora extends Model
{
	public $table = "impresoras";
    
	public $fillable = [
        "modelo_impresora"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
		"modelo_impresora" => "string"
    ];
	public static $rules = [
		"modelo_impresora" => "required"
	];

    public function Departamentos()
    {
        return $this->hasMany('App\Models\Impresora_Departamento','id_departamento');
    }


}
