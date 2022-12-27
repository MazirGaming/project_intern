<?php

namespace App\Repositories;

use App\Models\Course;

class CourseRepository extends BaseRepository
{
    public function __construct(Course $model)
    {
        $this->model = $model;
    }

    public function getByUserId($userId)
    {
        return $this->model->whereRelation('Users', 'users.id', $userId)->with('category')->get();
    }
}
