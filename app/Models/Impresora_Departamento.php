<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Impresora_Departamento extends Model
{
	public $table = "impresora_departamento";
    
	public $fillable = [
        "id_impresora",
        "id_departamento"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
		"id_impresora" => "integer",
        "id_departamento" => "integer"
    ];
	public static $rules = [
		"id_impresora" => "required",
        "id_departamento" => "required"
	];

    public function Impresora()
    {
        return $this->belongsTo('App\Models\Impresora','id_impresora');
    }

    public function Departamento()
    {
        return $this->belongsTo('App\Models\Departamento','id_departamento');
    }


}
