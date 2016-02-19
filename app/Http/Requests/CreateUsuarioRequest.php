<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use \Illuminate\Validation\Factory;
use App\Models\Usuario;
use Rut;

class CreateUsuarioRequest extends Request {
	
	public function __construct(Factory $factory){
	  	//Custom Validator Rut
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
		return Usuario::$create_rules;
	}

}
