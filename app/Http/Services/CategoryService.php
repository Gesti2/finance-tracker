<?php

namespace App\Http\Services;

use App\Repositories\Contracts\CategoryRepositoryContract;
use App\Support\Classes\ServiceResponse;




class CategoryService
{
    private static $categoryRepository;

    public function __construct(CategoryRepositoryContract $categoryRepository)
    {
        self::$categoryRepository = $categoryRepository;
    }

    public static function store(array $data)
    {
        try {
            $category = self::$categoryRepository->create($data);
            return new ServiceResponse(true, $category);
        } catch (\Exception $e) {
            return new ServiceResponse(false, null, $e->getMessage());
        }
    }

    public static function update(int $id, array $data)
    {
        try {
            $category = self::$categoryRepository->update($id, $data);
            return new ServiceResponse(true, $category);
        } catch (\Exception $e) {
            return new ServiceResponse(false, null, $e->getMessage());
        }
    }

    public static function delete(int $id)
    {
        try {
            $category = self::$categoryRepository->delete($id);
            return new ServiceResponse(true, $category);
        } catch (\Exception $e) {
            return new ServiceResponse(false, null, $e->getMessage());
        }
    }
}
