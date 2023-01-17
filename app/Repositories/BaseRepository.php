<?php

declare(strict_types=1);

namespace App\Repositories;

class BaseRepository
{
    protected $model;

    public function save(array $inputs, array $conditions = ['id' => null])
    {
        return $this->model->updateOrCreate($conditions, $inputs);
    }

    public function findById($id)
    {
        return $this->model->find($id);
    }
}
