<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Rules\Password;

class UserRepository
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
            $query->where('name', 'like', '%' . $input['search'] . '%')
                           ->orWhere('phone', 'like', '%' . $input['search'] . '%')
                           ->orWhere('email', 'like', '%' . $input['search'] . '%');
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

    public function save(array $input = [])
    {
        $query = $this->model->query();

        $validated = request()->validate([
            'name' => ['required'],
            'email' => ['unique:App\Models\User,email', 'regex:/(.+)@(.+)\.(.+)/i'],
            'phone' => ['unique:App\Models\User,phone', 'numeric'],
            'password' => ['required', Password::min(6)->symbols()]
        ]);

        $query->insert([
            'name' => $input['name'],
            'phone' => $input['phone'],
            'email' => $input['email'],
            'password' => $input['password'],
            'type' => $input['type']
        ]);

        return $query->orderBy('id', 'desc')->paginate();
    }
}
