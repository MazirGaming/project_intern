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
        return $this->model->whereRelation('CourseUser', 'user_id', $input, function ($query) {
            $query->whereRelation('Category', 'categories.id', 'courses.category_id')
                ->select('courses.*', 'categories.name as category');
        })->get();
    }
}
