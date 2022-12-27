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
        $query = $this->model;
        $query = $query::join('course_user', 'courses.id', '=', 'course_user.course_id')
            ->join('categories', 'categories.id', '=', 'courses.category_id')
            ->where('user_id', $input)
            ->select('courses.*', 'categories.name as category')
            ->get();
        return $query;
    }
}
