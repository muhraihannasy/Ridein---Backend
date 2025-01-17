<?php

namespace App\Repository;

use App\Models\Car;
use App\Repository\Interfaces\CarRepositoryInterface;

class CarRepository implements CarRepositoryInterface
{
    protected $model;

    public function __construct(Car $model)
    {
        $this->model = $model;
    }

    public function findAll()
    {
        return $this->model->all();
    }
    public function findOne($id)
    {
        return $this->model->where('uuid', $id)->get();
    }
    public function create(array $data)
    {
        return $this->model->create($data);
    }
    public function update($id, array $data)
    {
        return $this->model->where('uuid', $id)->update($data);
    }
    public function delete($id): string
    {
        return $this->model->where('uuid', $id)->delete();
    }
}
