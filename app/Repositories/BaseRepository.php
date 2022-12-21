<?php

namespace App\Repositories;

use App\Models\User;

class BaseRepository
{
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function save(array $inputs, $type, array $conditions = ['id' => null])
    {
        $inputs['type'] = $type;
        return $this->model->updateOrCreate($conditions, $inputs);
    }
}
