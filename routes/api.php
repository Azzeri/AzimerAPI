<?php

use App\UserInterface\Controller\Authentication\LogInController;
use App\UserInterface\Controller\FireBrigadeUnit\CreateFireBrigadeUnitController;
use Illuminate\Support\Facades\Route;

Route::post('/login', LogInController::class);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/fireBrigadeUnit', CreateFireBrigadeUnitController::class);
});
