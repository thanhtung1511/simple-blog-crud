<?php

use App\Http\Controllers\Backend\Auth\RoleController;
use App\Http\Controllers\Backend\Auth\UserController;

// Route names prefixed with 'admin.auth'.
Route::prefix('auth')
    ->namespace('Auth')
    ->as('auth.')
    ->middleware('role:'.config('access.roles.admin'))
    ->group(function () {
        // User Management
        // Route names prefixed with 'admin.auth.user'.
        Route::prefix('user')
            ->as('user.')
            ->group(function () {
                // User CRUD
                Route::get('/', [UserController::class, 'index'])->name('index');
                Route::get('create', [UserController::class, 'create'])->name('create');
                Route::post('/', [UserController::class, 'store'])->name('store');

                // Specific User
                Route::prefix('{user}')->group(function () {
                    // User
                    Route::get('/', [UserController::class, 'show'])->name('show');
                    Route::get('edit', [UserController::class, 'edit'])->name('edit');
                    Route::patch('/', [UserController::class, 'update'])->name('update');
                    Route::delete('/', [UserController::class, 'destroy'])->name('destroy');
                });
            });

        // Role Management
        // Route names prefixed with 'admin.auth.role'.
        Route::prefix('role')->as('role.')->group(function () {
            Route::get('/', [RoleController::class, 'index'])->name('index');
            Route::get('create', [RoleController::class, 'create'])->name('create');
            Route::post('/', [RoleController::class, 'store'])->name('store');

            Route::prefix('{role}')->group(function () {
                Route::get('edit', [RoleController::class, 'edit'])->name('edit');
                Route::patch('/', [RoleController::class, 'update'])->name('update');
                Route::delete('/', [RoleController::class, 'destroy'])->name('destroy');
            });
        });
    });
