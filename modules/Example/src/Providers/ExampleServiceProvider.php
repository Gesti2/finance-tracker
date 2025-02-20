<?php

namespace Modules\Example\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
class ExampleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'example');

        $this->bootMorphMaps();

        Route::prefix('api/v1')
            ->middleware('api')
            ->namespace('Modules\Example\Http\Controllers')
            ->group(__DIR__ . '/../../routes/examples.php');
    }

    private function bootMorphMaps()
    {
        //
    }
}
