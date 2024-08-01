<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Contracts\TransactionRepositoryContract;
use App\Repositories\Eloquent\TransactionRepository;
use App\Repositories\Contracts\CategoryRepositoryContract;
use App\Repositories\Eloquent\CategoryRepository;
use Illuminate\Database\Eloquent\Model;


class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(TransactionRepositoryContract::class, TransactionRepository::class);
        $this->app->bind(CategoryRepositoryContract::class, CategoryRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Model::unguard();
    }
}
