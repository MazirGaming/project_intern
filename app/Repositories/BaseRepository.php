<?php

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
        $query = $this->model->find($id);
        return $query;
    }
}
