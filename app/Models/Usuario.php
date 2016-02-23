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
		"rol",
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
		"apellido" => "string",
		"password" => "string"
    ];

	public static $create_rules = [
		"accountname" => "required|unique:usuarios",
		"rut" => "required|rut_valid",
		"nombre" => "required|alpha",
		"apellido" => "required|alpha",
		'password' => 'required|min:3|confirmed',
        'password_confirmation' => 'min:3'
	];

	public static $update_rules = [	
		"rut" => "required|rut_valid",
		"nombre" => "required|alpha",
		"apellido" => "required|alpha",
		'old_password'=>'required_with:password|min:3|old_password',
		'password' => 'required_with:old_password|min:3|confirmed',
        'password_confirmation' => 'min:3'
	];

    public function setPasswordAttribute($password)
    {   
        $this->attributes['password'] = bcrypt($password);//Encriptamos el Password
    }

  	public function setRutAttribute($rut) //Formateo de Rut
    {   
    	$rut=str_replace('-', '', $rut);//Eliminamos guion
    	$rut=str_replace('.', '', $rut);//Eliminamos los puntos
        $parte4 = substr($rut, -1); 	//  solo el numero verificador 
    	$parte3 = substr($rut, -4,3); 	// la cuenta va de derecha a izq  
    	$parte2 = substr($rut, -7,3); 	
        $parte1 = substr($rut, 0,-7);   //de esta manera toma todos los caracteres desde el 8 hacia la izq
    	$this->attributes['rut']=$parte1.".".$parte2.".".$parte3."-".$parte4;
    }

    public function setNombreAttribute($nombre)//Se coloca Mayúscula solo la primer letra
    {
    	$this->attributes['nombre']=ucfirst(strtolower(htmlentities($nombre)));
    }

    public function setApellidoAttribute($apellido)//Se coloca Mayúscula solo la primer letra
    {
    	$this->attributes['apellido']=ucfirst(strtolower(htmlentities($apellido)));
    }

    public function Impresoras()
    {
        return $this->hasMany('App\Models\Impresora','id_usuario');
    }

    public function Cuenta()
    {
        return $this->hasOne('App\Models\Cuenta','id_usuario');
    }

    public function hasCuenta(){
        return (bool) $this->Cuenta()->first();
    }

    public function Posts()
    {
        return $this->hasMany('App\Models\Post','id_usuario');
    }

    public function Comentarios()
    {
        return $this->hasMany('App\Models\Comentario','id_usuario');
    }

}
