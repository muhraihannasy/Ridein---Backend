<?php

class BrandCarService
{
    protected $brandCarRepository;

    public function __construct(BrandCarRepository $brandCarRepository)
    {
        $this->brandCarRepository = $brandCarRepository;
    }

    public function findAll()
    {
        return $this->brandCarRepository->findAll();
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
