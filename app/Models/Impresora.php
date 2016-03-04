<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Impresora extends Model
{
	public $table = "impresoras";
    
	public $fillable = [
        "modelo_impresora",
        "id_departamento"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
		"modelo_impresora" => "string",
        "id_departamento" => "integer"
    ];
	public static $rules = [
		"modelo_impresora" => "required",
        "id_departamento" => "required"
	];

    public function Departamento()
    {
        return $this->belongsTo('App\Models\Departamento','id_departamento');
    }


}
