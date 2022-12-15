<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function getAll(array $input = [])
    {
        $query = $this->model->query();
        if ($search = request()->search) {
            return $query = $query->where('name', 'like', '%' . $search . '%')
                           ->orWhere('phone', 'like', '%' . $search . '%')
                           ->orWhere('email', 'like', '%' . $search . '%')->paginate(10);
        }
        return $query->orderBy('id', 'desc')->paginate(10);
    }
}
