<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Departamento extends Model
{
    
	public $table = "departamentos";
    

	public $fillable = [
	    "nombre",
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
	    "nombre" => "required",
	];


    public function Impresoras()
    {
        return $this->hasMany('App\Models\Impresora','id_departamento');
    }

     public function Usuarios()
    {
        return $this->hasMany('App\Models\Usuario','id_departamento');
    }

}
