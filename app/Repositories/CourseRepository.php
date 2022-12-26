<?php

namespace App\Repositories;

use App\Models\Course;

class CourseRepository extends BaseRepository
{
    protected $model;

    public function __construct(Course $model)
    {
        $this->model = $model;
    }

    public function getCourses(array $input = [])
    {
        $query = $this->model;
        $query = $query::join('course_user', 'courses.id', '=', 'course_user.course_id')
            ->join('categories', 'categories.id', '=', 'courses.category_id')
            ->where('user_id', $input['0'])
            ->select('courses.*', 'categories.name as category')
            ->get();
        return $query;
    }
}
