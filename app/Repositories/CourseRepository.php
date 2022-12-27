<?php

namespace App\Repositories;

use App\Models\Course;

class CourseRepository extends BaseRepository
{
    public function __construct(Course $model)
    {
        $this->model = $model;
    }

    public function getByUserId($input)
    {
        return $this->model->whereRelation('Users', 'users.id', $input)->with('category')->get();
    }
}
