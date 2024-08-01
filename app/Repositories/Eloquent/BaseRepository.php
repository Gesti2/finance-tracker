<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Contracts\BaseRepositoryContract;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

abstract class BaseRepository implements BaseRepositoryContract
{
    // abstract class cannot be instantieded directly, hence 'BaseRepositoryContract'

    /**
     * @var Application 
     */
    private $app;

    /**
     * @var Model|Builder
     */
    protected $model;

    /**
     * @param \Illuminate\Contracts\Foundation\Application $app
     * @throws Exception
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
        $this->makeModel();
    }

    /**
     * Specify Model class name
     * @return mixed
     */
    abstract protected function model(); // Example: make() used at TransactionRepository.php 

    /**
     * @param array $colums
     * @return mixed //\Illuminate\Database\Eloquent\Collection
     */
    public function all($colums = array('*'))
    {
        return $this->model->get($colums);
    }

    /**
     * @param int $perPage
     * @param array $colums
     * @return mixed
     */
    public function paginate($perPage = 15, $colums = array('*'))
    {
        return $this->model->paginate($perPage, $colums);
    }


    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        $model = $this->model->findOrFail($id);
        $model->update($data);

        return $model;
    }


    public function delete($id)
    {
        $transaction = $this->model->findOrFail($id);
        return $this->model->destroy($id);
    }

    /**
     * @return Model|Builder
     * @throws Exception
     */
    public function makeModel()
    {
        $model = $this->app->make($this->model());

        if (!$model instanceof Model) {
            throw new Exception("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");
        }

        return $this->model = $model;
    }

    public function find($id, $columns = array('*'))
    {
        return $this->model->find($id, $columns);
    }

    public function findOrFail($id, $columns = array('*'))
    {
        return $this->model->findOrFail($id, $columns);
    }

    public function findOrFailBy($attribute, $value, $columns = array('*'))
    {
        return $this->model->where($attribute, $value)->firstOrFail($columns);
    }
}
