<?php

namespace App\Admin\Repositories;

use App\Admin\Repositories\EloquentStandardRepositoryInterface;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Http\Exceptions\HttpResponseException;

abstract class EloquentStandardRepository implements EloquentStandardRepositoryInterface
{
     /**
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model;
    /**
     * Current Object instance
     *
     * @var object
     */
    protected $instance;

    /**
     * EloquentRepository constructor.
     */
    public function __construct()
    {
        $this->setModel();
    }
    
    /**
     * get model
     * @return string
     */
    abstract public function getModel();

    /**
     * Set model
     */
    public function setModel()
    {
        //other -> new Model
        $this->model = app()->make(
            $this->getModel()
        );
    }
    /**
     * Get All
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAll()
    {
        return $this->model->get();
    }
    /**
     * Find a single record
     *
     * @param array $filter
     * @param array $relations
     * @return mixed
     * @throws \Exception
     */
    public function findByOrFail(array $filter, array $relations = []){
        $this->instance = $this->model;

        $this->applyFilters($filter);

        $this->instance = $this->instance->with($relations)->firstOrFail();

        return $this->instance;
    }
    /**
     * Find a single record
     *
     * @param array $filter
     * @param array $relations
     * @return mixed
     * @throws \Exception
     */
    public function findBy(array $filter, array $relations = []){

        $this->instance = $this->model;

        $this->applyFilters($filter);

        $this->instance = $this->instance->with($relations)->first();

        return $this->instance;
    }
    /**
     * Find a single record
     *
     * @param int $id
     * @param array $relations
     * @return mixed
     * @throws \Exception
     */
    public function findOrFail($id, array $relations = []){

        $this->instance = $this->model->findOrFail($id)->load($relations);

        return $this->instance;
    }
    /**
     * Find a single record
     *
     * @param int $id
     * @param array $relations
     * @return mixed
     * @throws \Exception
     */
    public function find($id, array $relations = [])
    {
        $this->instance = $this->model->find($id)->load($relations);

        return $this->instance;
    }
    /**
     * Create
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        return $this->model->create($data);
    }
    /**
     * Update
     * @param $id
     * @param array $data
     * @return bool|mixed
     */
    public function update($id, array $data)
    {
        $this->find($id);

        if ($this->instance) {

            $this->instance->update($data);

            return $this->instance;
        }

        return false;
    }
    /**
     * Delete
     *
     * @param $id
     * @return bool
     */
    public function delete($id)
    {
        $this->find($id);

        if ($this->instance){

            $this->instance->delete();

            return true;
        }

        return false;
    }

    public function getBy(array $filter, array $relations = []){
        
        $this->getByQueryBuilder($filter, $relations);

        return $this->instance->get();
    }

    public function getByQueryBuilder(array $filter, array $relations = []) {

        $this->getQueryBuilderOrderBy();

        $this->applyFilters($filter);
        
        return $this->instance->with($relations);
    }

    public function getQueryBuilderOrderBy($column = 'id', $sort = 'DESC'){

        $this->getQueryBuilder();

        $this->instance = $this->instance->orderBy($column, $sort);

        return $this->instance;
    }

    /**
     * get query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function getQueryBuilder()
    {
        $this->instance = $this->model->newQuery();

        return $this->instance;
    }

    protected function applyFilters(array $filter){
        
        foreach($filter as $field => $value){
            if (is_array($value)) {

                [$field, $condition, $val] = $value;

                $this->instance = match (strtoupper($condition)) {
                    'IN' => $this->instance->whereIn($field, $val),
                    'NOT_IN' => $this->instance->whereNotIn($field, $val),
                    default => $this->instance->where($field, $condition, $val)
               };
            }else{
                $this->instance = $this->instance->where($field, $value);
            }
        }
    }

    public function authorize($action = 'view', $guard = 'web'){

        if(!$this->instance || auth()->guard($guard)->user()->can($action, $this->instance)){
            
            return true;
        }

        throw new HttpException(401, 'UNAUTHORIZED');
    }

    public function getInstance(){
        
        return $this->instance;
    }
}