<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Services\Auth\Authentication;
use App\Http\Services\Auth\AuthenticationInterface;

use App\Repositories\Contracts\UserRepositoryContract;
use App\Repositories\Eloquent\UserRepository;

use App\Repositories\Contracts\TransactionRepositoryContract;
use App\Repositories\Eloquent\TransactionRepository;

use App\Repositories\Contracts\CategoryRepositoryContract;
use App\Repositories\Eloquent\CategoryRepository;

use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Database\Eloquent\Model;


class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(AuthenticationInterface::class, Authentication::class);

        $this->app->bind(UserRepositoryContract::class, UserRepository::class);

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
