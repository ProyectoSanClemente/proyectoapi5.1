<?php namespace App\Http\Requests;

use \Illuminate\Validation\Factory;
use App\Http\Requests\Request;
use App\Models\Usuario;
use Hash;
use Rut;

class UpdateUsuarioRequest extends Request {

	public function __construct(Factory $factory){
	  	//Custom Validator Rut
        $factory->extend('old_password',
            function ($attribute, $value, $parameters)
            {
            $id=Request::get('id');
        	$usuario=Usuario::find($id);           	
            	
                return Hash::check($value, $usuario->password);
            }
            ,'La Constraseña actual no corresponde'
        );

        $factory->extend('rut_valid',
        	
            function ($attribute, $value, $parameters)
            {
                return Rut::check($value);
            }
            ,'El campo Rut no tiene un formato válido'
        );
	}

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return Usuario::$update_rules;
	}

}
