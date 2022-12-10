<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{
    PlanController
};

Route::prefix('admin')
    ->group(function () {
    Route::any('plans/search', [PlanController::class, 'search'])->name('plans.search');
    Route::resource('plans','App\Http\Controllers\Admin\PlanController');
    Route::get('create', [PlanController::class, 'create'])->name('plans.create');
    Route::get('/', [PlanController::class, 'index'])->name('admin.index');
});




Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
