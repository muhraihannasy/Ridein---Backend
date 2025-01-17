<?php

namespace App\Repository\Interfaces;

interface CarRepositoryInterface
{
    public function findAll();
    public function findOne($id);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
}
