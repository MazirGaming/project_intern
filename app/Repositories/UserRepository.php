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

        if (!empty($input['search'])) {
            $query->where('name', 'like', '%' . $input['search'] . '%')
                           ->orWhere('phone', 'like', '%' . $input['search'] . '%')
                           ->orWhere('email', 'like', '%' . $input['search'] . '%');
        }


        try {
            $columnSortName = $input['column_name'] ?? 'id';
            $columnSortType = $input['sort_type'] ?? 'DESC';

            return $query->orderBy($columnSortName, $columnSortType)->paginate(10);
        } catch(\Illuminate\Database\QueryException $ex) {
            dd($ex->getMessage());
        }
        // return $query->orderBy('id', 'desc')->paginate(10);
    }
}
