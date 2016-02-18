<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Post extends Model
{
    
	public $table = "posts";
    

	public $fillable = [
		"id_usuario",
		"contenido",
		"tipo",
		"titulo"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
    	"id_usuario" => "string",
		"contenido" => "string",
		"tipo" => "string"
    ];

	public static $rules = [
	];

	public static $update_rules = [
		

	];

	public function Usuario()
    {
        return $this->belongsTo('App\Models\Usuario','id_usuario');
    }
}
