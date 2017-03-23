<?php
namespace App\Core\Parents;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Container\Container as App;

abstract class AbstractRepository {

    /**
     * @var App
     */
    private $app;

    /**
     * @var Model
     */
    protected $model;

    /**
     * @param App $app
     */
    public function __construct(App $app) {
        $this->app = $app;
        $this->makeModel();
    }

    /**
     * Specify Model class name
     *
     * @return BaseModel
     */
    abstract function model();

    /**
     * @param array $columns
     * @return mixed
     */
    public function all($columns = array('*')) {
        return $this->model->get($columns);
    }

    /**
     * @param $id
     * @param array $columns
     * @return mixed
     */
    public function find($id, $columns = array('*')) {
        return $this->model->find($id, $columns);
    }

    /**
     * @param array $columns
     * @return Collection|static[]
     */
    public function findAll($columns = array('*')) {
        return $this->model->all($columns);
    }

    /**
     * @param $column
     * @param $values
     * @return mixed
     */
    public function findWhereIn($column, $values) {
        return $this->model->whereIn($column, $values);
    }

    /**
     * @param $value
     * @param array $relations
     * @param string $column
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function findOneWith($value, array $relations, $column = 'id') {
        $model = $this->model;

        foreach ($relations as $relation) {
            $model->with($relation);
        }

        return $model->where($column, $value)->first();
    }

    /**
     * @param array $attributes
     * @return mixed
     */
    public function findBy(array $attributes) {
        return $this->model->where($attributes)->get();
    }

    /**
     * @param array $attributes
     * @return mixed
     */
    public function findOneBy(array $attributes) {
        return $this->model->where($attributes)->first();
    }

    /**
     * @return Model
     * @throws \Exception
     */
    public function makeModel() {
        $model = $this->app->make($this->model());

        if (!$model instanceof Model)
            throw new \Exception("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");

        return $this->model = $model;
    }
}