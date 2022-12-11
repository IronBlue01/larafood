<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{
    PlanController,
    DetailPlanController,
    ACL\ProfileController
};

Route::prefix('admin')
    ->group(function () {

    /**
    * Routes Profiles
    */
    Route::any('search', [ProfileController::class, 'search'])->name('profiles.search');
    Route::resource('profiles', 'App\Http\Controllers\Admin\ACL\ProfileController');

    /**
    * Routes Details Plans
    */
    Route::delete('plans/{url}/details/{idDetail}', [DetailPlanController::class, 'destroy'])->name('details.plan.destroy');
    Route::get('plans/{url}/details/create', [DetailPlanController::class, 'create'])->name('details.plan.create');
    Route::get('plans/{url}/details/{idDetail}', [DetailPlanController::class, 'show'])->name('details.plan.show');
    Route::put('plans/{url}/details/{idDetail}', [DetailPlanController::class, 'update'])->name('details.plan.update');
    Route::get('plans/{url}/details/{idDetail}/edit', [DetailPlanController::class, 'edit'])->name('details.plan.edit');
    Route::get('plans/{url}/details', [DetailPlanController::class, 'index'])->name('details.plan.index');
    Route::post('plans/{url}/details', [DetailPlanController::class, 'store'])->name('details.plan.store');

    /**
     * Routes Plans
     */
    Route::any('plans/search', [PlanController::class, 'search'])->name('plans.search');
    Route::resource('plans','App\Http\Controllers\Admin\PlanController');
    Route::get('create', [PlanController::class, 'create'])->name('plans.create');

    /**
     * Routes Dashboard
     */
    Route::get('/', [PlanController::class, 'index'])->name('admin.index');
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
