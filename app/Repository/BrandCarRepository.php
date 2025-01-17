<?php

use App\Models\BrandCar;
use App\Repositories\Interfaces\UserRepositoryInterface;


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
        return $this->model->find($id);
    }
    public function create(array $data)
    {
        return $this->model->create($data);
    }
    public function update($id, array $data)
    {
        return $this->model->update($id, $data);
    }
    public function delete($id): string
    {
        return $this->model->where('id', $id)->delete();
    }
}
