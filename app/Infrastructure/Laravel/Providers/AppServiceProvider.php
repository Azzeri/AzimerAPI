<?php

namespace App\Infrastructure\Laravel\Providers;

use App\Domain\Authentication\Service\CheckPasswordServiceInterface;
use App\Domain\Authentication\Service\CreateAuthenticationTokenServiceInterface;
use App\Domain\FireBrigadeUnit\Repository\FireBrigadeUnitRepositoryInterface;
use App\Domain\User\Repository\UserRepositoryInterface;
use App\Infrastructure\Authentication\Service\CheckPasswordServiceAdapter;
use App\Infrastructure\Authentication\Service\CreateAuthenticationTokenServiceAdapter;
use App\Infrastructure\FireBrigadeUnit\Persistence\Eloquent\Repository\FireBrigadeUnitEloquentRepository;
use App\Infrastructure\User\Persistence\Eloquent\Repository\UserEloquentRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(FireBrigadeUnitRepositoryInterface::class, FireBrigadeUnitEloquentRepository::class);
        $this->app->bind(CheckPasswordServiceInterface::class, CheckPasswordServiceAdapter::class);
        $this->app->bind(
            CreateAuthenticationTokenServiceInterface::class,
            CreateAuthenticationTokenServiceAdapter::class
        );
        $this->app->bind(UserRepositoryInterface::class, UserEloquentRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
