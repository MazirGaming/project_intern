<?php

declare(strict_types=1);

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
        $query = $this->model->query()->with(['category', 'attachment'])->withCount(['sections', 'lessons']);

        if (!empty($input['search'])) {
            $query->where(function ($query) use ($input) {
                $query->where('name', 'like', '%'.$input['search'].'%');
            });
        }

        if (!empty($input['category_id'])) {
            $query->where('category_id', $input['category_id']);
        }

        $columnSortName = $input['column_name'] ?? 'id';
        $columnSortType = $input['sort_type'] ?? 'desc';
        $validColumn = Schema::hasColumn($this->model-> getTable(), $columnSortName);
        $validSortType = in_array(strtolower(trim($columnSortType)), static::SORT_TYPES);

        if ($validColumn && $validSortType) {
            return $query->orderBy($columnSortName, $columnSortType)->paginate(8);
        }

        return $query->orderBy('id', 'desc')->paginate(8);
    }

    public function getByUserId($userId)
    {
        return $this->model->whereRelation('Users', 'users.id', $userId)->with('category')->get();
    }
}
