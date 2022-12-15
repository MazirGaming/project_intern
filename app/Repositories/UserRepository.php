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

        if ($search = $input) {
            $query->where('name', 'like', '%' . $input['search'] . '%')
                           ->orWhere('phone', 'like', '%' . $input['search'] . '%')
                           ->orWhere('email', 'like', '%' . $input['search'] . '%');
        }

        return $query->orderBy('id', 'desc')->paginate(10);
    }
}
