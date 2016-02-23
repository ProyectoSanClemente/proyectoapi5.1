<?php namespace App\Libraries\Repositories;

use App\Models\Cuenta;
use Bosnadev\Repositories\Eloquent\Repository;
use Schema;
use Exception;

class CuentaRepository extends Repository
{

    /**
    * Configure the Model
    *
    **/
    public function model()
    {
      return 'App\Models\Cuenta';
    }

	public function search($input)
    {
        $query = Cuenta::query();

        $columns = Schema::getColumnListing('cuentas');
        $attributes = array();

        foreach($columns as $attribute)
        {
            if(isset($input[$attribute]) and !empty($input[$attribute]))
            {
                $query->where($attribute, $input[$attribute]);
                $attributes[$attribute] = $input[$attribute];
            }
            else
            {
                $attributes[$attribute] =  null;
            }
        }

        return [$query->get(), $attributes];
    }

    public function apiFindOrFail($id)
    {
        $model = $this->find($id);

        if(empty($model))
        {
            throw new Exception("Cuenta no encontrada");
        }

        return $model;
    }

    public function apiDeleteOrFail($id)
    {
        $model = $this->find($id);

        if(empty($model))
        {
            throw new Exception("Cuenta no encontrada");
        }

        return $model->delete();
    }
    
    /**
    *@param $id Cuenta id
    *
    *@return Response
    */
    public function obtenercuenta($id,$sistema)
    {
        $model = $this->apiFindOrFail($id);
        $user='id_'.(string)$sistema;
        $pass='pass_'.(string)$sistema;
        
        if(empty($model->$user)|| empty($model->$pass))
        {
            throw new Exception("Faltan datos por ingresar del Sistema ".ucfirst($sistema));
        }
        return $model;
    }

}
