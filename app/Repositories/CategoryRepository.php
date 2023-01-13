<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository extends BaseRepository
{
    public function __construct(Category $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model->all();
    }
}
