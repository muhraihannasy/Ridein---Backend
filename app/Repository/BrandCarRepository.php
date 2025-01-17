<?php

namespace App\Repository;

use App\Models\BrandCar;
use App\Repository\Interfaces\BrandCarRepositoryInterface;

class BrandCarRepository implements BrandCarRepositoryInterface
{
    protected $model;

    public function __construct(BrandCar $model)
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
