<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Schema;

class UserRepository extends BaseRepository
{
    public const SORT_TYPES = ['desc', 'asc'];

    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function getAll(array $input = [])
    {
        $query = $this->model->query();

        if (!empty($input['search'])) {
            $query->where(function ($query) {
                $query->where('name', 'like', '%' . request('search') . '%')
                    ->orWhere('phone', 'like', '%' . request('search') . '%')
                    ->orWhere('email', 'like', '%' . request('search') . '%');
            });
        }

        if (!empty($input['role'])) {
            $query->where('type', $input['role']);
        }
        $columnSortName = $input['column_name'] ?? 'id';
        $columnSortType = $input['sort_type'] ?? 'desc';
        $validColumn = Schema::hasColumn($this->model-> getTable(), $columnSortName);
        $validSortType = in_array(strtolower(trim($columnSortType)), static::SORT_TYPES);

        if ($validColumn && $validSortType) {
            return $query->orderBy($columnSortName, $columnSortType)->paginate();
        }

        return $query->orderBy('id', 'desc')->paginate();
    }
}
