<?php

namespace App\Service\Admin;

use App\Repository\CarRepository;

class CarService
{
    protected $carRepository;

    public function __construct(CarRepository $carRepository)
    {
        $this->carRepository = $carRepository;
    }

    public function findAll()
    {
        return $this->carRepository->findAll();
    }
    public function findOne($id)
    {
        return $this->carRepository->findOne($id);
    }
    public function create(array $data)
    {
        return $this->carRepository->create($data);
    }
    public function update($id, array $data)
    {
        return $this->carRepository->update($id, $data);
    }
    public function delete($id): string
    {
        return $this->carRepository->delete($id);
    }
}
