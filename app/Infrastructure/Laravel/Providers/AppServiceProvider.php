<?php

namespace App\Infrastructure\Laravel\Providers;

use App\Domain\FireBrigadeUnit\Repository\FireBrigadeUnitRepositoryInterface;
use App\Infrastructure\FireBrigadeUnit\Persistence\Eloquent\Repository\FireBrigadeUnitEloquentRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(FireBrigadeUnitRepositoryInterface::class, FireBrigadeUnitEloquentRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
