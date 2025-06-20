<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashbordController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\TechnologyController;
use App\Http\Controllers\ProfileController;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])
    ->name("admin.")
    ->prefix("admin")
    ->group(function () {
        Route::get("/", [DashbordController::class, 'index'])
            ->name("index");

        Route::get("/profile", [DashbordController::class, 'profile'])
            ->name("profile");

        Route::prefix('settings')
            ->name('settings.')
            ->group(function () {
                Route::get('/', [SettingsController::class, 'index'])
                    ->name('index');
                Route::resource('categories', CategoryController::class);
                Route::resource('technologies', TechnologyController::class);
            });
    });



Route::resource('projects', ProjectController::class)
    ->middleware(['auth', 'verified']);







require __DIR__ . '/auth.php';
