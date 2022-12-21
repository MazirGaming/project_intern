<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class BaseRepository
{
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function save(array $inputs, array $conditions = ['id' => null])
    {
        if (Auth::user()->isAdmin()) {
            $inputs['type'] = 1;
            return $this->model->updateOrCreate($conditions, $inputs);
        }

        return $this->model->updateOrCreate($conditions, $inputs);
    }
}
