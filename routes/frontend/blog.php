<?php

use App\Http\Controllers\Frontend\Blog\PostController;

// Route names prefixed with 'frontend.blog'.
Route::prefix('blog')
    ->namespace('Blog')
    ->as('blog.')
    ->middleware('web')
    ->group(function () {
        // User Post Management
        // Route names prefixed with 'frontend.blog.post'
        Route::prefix('post')
            ->as('post.')
            ->group(function () {
                // Post CRUD
                Route::get('/', [PostController::class, 'index'])->name('index');
                Route::get('create', [PostController::class, 'create'])->name('create');
                Route::post('/', [PostController::class, 'store'])->name('store');

                // Specific Post
                Route::prefix('{post}')->group(function () {
                    // User
                    Route::get('/', [PostController::class, 'show'])->name('show');
                    Route::get('edit', [PostController::class, 'edit'])->name('edit');
                    Route::patch('/', [PostController::class, 'update'])->name('update');
                    Route::delete('/', [PostController::class, 'destroy'])->name('destroy');
                });
            });
    });
