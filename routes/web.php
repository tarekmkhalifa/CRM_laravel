<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::middleware('isGuest')->group(function () { // guest routes
    // Auth
    Route::get('login', [AuthController::class, 'login'])->name('auth.login');
    Route::post('login', [AuthController::class, 'handleLogin'])->name('auth.handleLogin');
});


Route::middleware('isLogin')->group(function () { // auth routes

    Route::get('/', [HomeController::class, 'index'])->name('admin.index');

    Route::prefix('/dashboard')->name('dashboard.')->group(function () {
        // Admin home page
        Route::get('/', [HomeController::class, 'index'])->name('admin.index');

        // Users
        Route::resource('/users', UserController::class);

        // Clients
        Route::resource('/clients', ClientController::class);

        // Projects
        Route::resource('/projects', ProjectController::class);
        Route::get('/projects/{project}/done', [ProjectController::class, 'done'])->name('projects.done');

        // Tasks
        Route::resource('/tasks', TaskController::class);
        Route::get('/tasks/{task}/done', [TaskController::class, 'done'])->name('tasks.done');

        // logout
        Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
    });
});