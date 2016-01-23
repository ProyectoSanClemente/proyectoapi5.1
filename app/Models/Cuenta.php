<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Cuenta extends Model
{
    
	public $table = "cuentas";
    

	public $fillable = [
		"accountname",
		"id_sidam",
		"pass_sidam",
		"id_crecic",
		"pass_crecic",
		"id_zimbra",
		"pass_zimbra",
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
    	"accountname" => "string",
		"id_sidam" => "string",
		"pass_sidam" => "string",
		"id_crecic" => "string",
		"pass_crecic" => "string",
		"id_zimbra" => "string",
		"pass_zimbra" => "string"
    ];

	public static $rules = [
		"accountname" => "unique:cuentas"
	];

	public static $update_rules = [
		

	];

	public function usuario()
    {
        return $this->belongsTo('Usuario','accountname');
    }

}
