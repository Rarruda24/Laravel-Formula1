<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\PilotController;

// Página Principal
Route::get('/', [MainController::class, 'index'])->name('main');

// Rotas de Equipes
Route::controller(TeamController::class)->prefix('teams')->name('teams.')->group(function () {
    Route::post('/store', 'store')->name('store');
    Route::post('/update/{team}', 'update')->name('update');
    Route::get('/edit/{team}', 'edit')->name('edit');
    Route::get('/show/{team}', 'show')->name('show');
    Route::get('/delete/{id}', 'destroy')->name('delete');
});

// Rotas de Pilotos
Route::controller(PilotController::class)->prefix('pilots')->name('pilots.')->group(function () {
    Route::post('/store', 'store')->name('store');
    Route::post('/update/{pilot}', 'update')->name('update');
    Route::get('/edit/{pilot}', 'edit')->name('edit');
    Route::get('/show/{pilot}', 'show')->name('show');
    Route::get('/delete/{id}', 'destroy')->name('delete');
});