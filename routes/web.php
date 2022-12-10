<?php

use Illuminate\Support\Facades\Route;

Route::any('admin/plans/search', [App\Http\Controllers\PlanController::class, 'search'])->name('plans.search');
Route::get('admin/plans/{url}', [App\Http\Controllers\PlanController::class, 'show'])->name('plans.show');
Route::post('admin/plans', [App\Http\Controllers\PlanController::class, 'store'])->name('plans.store');
Route::get('admin/plans', [App\Http\Controllers\PlanController::class, 'index'])->name('plans.index');
Route::get('admin/create', [App\Http\Controllers\PlanController::class, 'create'])->name('plans.create');
Route::delete('admin/plans/{url}', [App\Http\Controllers\PlanController::class, 'destroy'])->name('plans.delete');


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
