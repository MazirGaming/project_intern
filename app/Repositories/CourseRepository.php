<?php

namespace App\Repositories;

use App\Models\Course;
use Illuminate\Support\Facades\Schema;

class CourseRepository extends BaseRepository
{
    public const SORT_TYPES = ['desc', 'asc'];

    public function __construct(Course $model)
    {
        $this->model = $model;
    }

    public function getAll(array $input = [])
    {
        $query = $this->model->query();

        if (!empty($input['search'])) {
            $query->where(function ($query) use ($input) {
                $query->where('name', 'like', '%' . $input['search'] . '%')
                    ->orWhereRelation('category', 'name', 'like', '%' . $input['search'] . '%');
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

    public function getByUserId($userId)
    {
        return $this->model->whereRelation('Users', 'users.id', $userId)->with('category')->get();
    }
}
