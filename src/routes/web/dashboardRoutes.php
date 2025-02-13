<?php

use App\Http\Controllers\Sdisauth\DashbordController;
use Illuminate\Support\Facades\Route;



Route::prefix('dashboard')->group(function ()  {
    Route::get('/', [DashbordController::class, "vueDashboard"])
          ->middleware(['auth', 'verified'])
          ->name('dashboard');
});
