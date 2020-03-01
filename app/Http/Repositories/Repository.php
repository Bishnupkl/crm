<?php

namespace App\Http\Repositories;
use App\Http\Interfaces\RepositoryInterface;
use Illuminate\Container\Container;
abstract class Repository implements RepositoryInterface
{
    protected $model;
    /**
     * Repository constructor.
     * @param Container $app
     */
    public function __construct(Container $app)
    {
        $this->model = $app->make($this->model());
    }
    abstract public function model();
    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }
}
