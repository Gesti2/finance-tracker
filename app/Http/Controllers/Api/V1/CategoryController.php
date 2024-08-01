<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Category;
use Illuminate\Http\Request;

use App\Repositories\Contracts\CategoryRepositoryContract;
use App\Http\Resources\CategoryResource;
use App\Http\Services\CategoryService;
use App\http\Requests\Api\V1\CategoryStoreRequest;
use App\http\Requests\Api\V1\CategoryUpdateRequest;

class CategoryController extends ApiController
{
    private $categoryRepository;

    public function __construct(CategoryRepositoryContract $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $categories = $this->categoryRepository->paginate(perPage: 10);

        return CategoryResource::collection($categories);
    }

    public function store(CategoryStoreRequest $request)
    {
        $response = CategoryService::store($request->all());

        if ($response->success()) {
            return new CategoryResource($response->getModel());
        } else {
            return response()->json(null, 400);
        }
    }
}
