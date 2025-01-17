<?php

namespace App\Service\Admin;

use App\Repository\BrandCarRepository;

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
        return $this->brandCarRepository->findOne($id);
    }
    public function create(array $data)
    {
        return $this->brandCarRepository->create($data);
    }
    public function update($id, array $data)
    {
        return $this->brandCarRepository->update($id, $data);
    }
    public function delete($id): string
    {
        return $this->brandCarRepository->where('id', $id)->delete();
    }
}
