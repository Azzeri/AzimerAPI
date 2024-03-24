<?php

use App\UserInterface\Controller\FireBrigadeUnit\CreateFireBrigadeUnitController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    echo 'Azimer API';
});

Route::post('/fireBrigadeUnit', CreateFireBrigadeUnitController::class);
