<?php namespace App\Libraries\Repositories;

use App\Models\Notice;
use Bosnadev\Repositories\Eloquent\Repository;
use Schema;
use Symfony\Component\HttpKernel\Exception\HttpException;

class NoticeRepository extends Repository
{

    /**
    * Configure the Model
    *
    **/
    public function model()
    {
      return 'App\Models\Notice';
    }

	public function search($input)
    {
        $query = Notice::query();

        $columns = Schema::getColumnListing('notices');
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
            throw new HttpException(1001, "Notice not found");
        }

        return $model;
    }

    public function apiDeleteOrFail($id)
    {
        $model = $this->find($id);

        if(empty($model))
        {
            throw new HttpException(1001, "Notice not found");
        }

        return $model->delete();
    }

      /**
     * @param int $perPage
     * @param value $attribute
     * @param value $order
     * @param array $columns
     * @return mixed
     */
    public function paginateordered($perPage = 1, $attribute = 'updated_at', $order = 'desc', $columns = array('*')) {
        $this->applyCriteria();
        return $this->model->orderBy($attribute, $order)->paginate($perPage);
    }

}
