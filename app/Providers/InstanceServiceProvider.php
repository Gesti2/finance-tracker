<?php

namespace App\Providers;

use App\Http\Services\Auth\Authentication;
use App\Http\Services\Auth\AuthenticationInterface;
use App\Http\Services\TransactionService;
use App\Repositories\Eloquent\TransactionRepository;
use App\Http\Services\CategoryService;
use App\Repositories\Eloquent\CategoryRepository;

use Illuminate\Support\ServiceProvider;

class InstanceServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(AuthenticationInterface::class, Authentication::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app->instance(
            TransactionService::class,
            new TransactionService(
                new TransactionRepository($this->app)
            )
        );

        $this->app->instance(
            CategoryService::class,
            new CategoryService(
                new CategoryRepository($this->app)
            )
        );
    }
}
