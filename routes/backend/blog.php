<?php

use App\Http\Controllers\Backend\Blog\PostController;

// Route names prefixed with 'admin.blog'.
Route::prefix('blog')
    ->namespace('Blog')
    ->as('blog.')
    ->middleware('role:'.config('access.roles.admin'))
    ->group(function () {
        // Admin Post Management
        // Route names prefixed with 'admin.blog.post'
        Route::prefix('post')
            ->as('post.')
            ->group(function () {
                // Post index for admin (not CRUD)
                Route::get('/', [PostController::class, 'index'])->name('index');

                // Specific Post
                Route::prefix('{post}')->group(function () {
                    // Post
                    Route::get('/', [PostController::class, 'show'])->name('show');
                    Route::patch('publish', [PostController::class, 'publish'])->name('publish');
                    Route::patch('unpublish', [PostController::class, 'unpublish'])->name('unpublish');
                });
            });
    });
