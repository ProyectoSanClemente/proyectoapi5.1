<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Comentario extends Model
{
    
	public $table = "comentarios";
    

	public $fillable = [
		"contenido"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
    	"id_usuario" => "string",
		"contenido" => "string",
		"id_post" => "string"
    ];

	public static $rules = [
	];

	public static $update_rules = [
		

	];

	public function Usuario()
    {
        return $this->belongsTo('App\Models\Usuario','id_usuario');
    }
	public function Post()
    {
        return $this->belongsTo('App\Models\Post','id_post');
    }
}
