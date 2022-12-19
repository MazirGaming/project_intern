<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Schema;

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

        if (!empty($input['search'])) {
            $query->where('name', 'like', '%' . $input['search'] . '%')
                           ->orWhere('phone', 'like', '%' . $input['search'] . '%')
                           ->orWhere('email', 'like', '%' . $input['search'] . '%');
        }
        $columnSortName = $input['column_name'] ?? 'id';
        $columnSortType = $input['sort_type'] ?? 'DESC';
        if (!Schema::hasColumn('users', $columnSortName) || $columnSortType != 'asc' || $columnSortType != 'desc') {
            $columnSortName = 'id';
            $columnSortType = 'DESC';
            return $query->orderBy($columnSortName, $columnSortType)->paginate(10);
        }
        return $query->orderBy($columnSortName, $columnSortType)->paginate(10);
    }
}
