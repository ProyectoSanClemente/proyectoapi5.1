<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Usuario extends Model
{
    
	public $table = "usuarios";


	public $fillable = [
		"accountname",
		"rut",
		"nombre",
		"apellido",
		"displayname",
		"rol",
		"email",
		"password",
		"imagen"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "accountname"=> "string",
		"nombre" => "string",
		"displayname"=> "string",
		"apellido" => "string",
		"email" => "string",
		"password" => "string"
    ];

	public static $create_rules = [
		"accountname" => "required|unique:usuarios",
		"nombre" => "required",
		"apellido" => "required",
		"email" => "email",
		'password' => 'required|min:3|confirmed',
        'password_confirmation' => 'min:3'
	];

		public static $update_rules = [
		"nombre" => "required",
		"apellido" => "required",
		'old_password'=>"required_with:password|min:3",
		'password' => 'required_with:old_password|min:3|confirmed',
        'password_confirmation' => 'min:3'
	];

    public function setPasswordAttribute($password)
    {   
        $this->attributes['password'] = bcrypt($password);
    }

    public function cuenta()
    {
        return $this->hasOne('Cuenta','accountname');
    }

        public function impresora()
    {
        return $this->hasMany('Impresora','accountname');
    }

}
