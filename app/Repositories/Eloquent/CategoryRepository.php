<?php

namespace App\Repositories\Eloquent;

use App\Models\Category;
use App\Repositories\Contracts\CategoryRepositoryContract;

class CategoryRepository extends BaseRepository implements CategoryRepositoryContract
{
    protected function model()
    {
        return Category::class;
    }
}
