<?php

use App\Http\Controllers\Frontend\DefaultController;
use App\Http\Controllers\Frontend\User\UserController;
use App\Http\Controllers\Frontend\User\DashboardController;


/*
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::get('/', [DefaultController::class, 'index'])->name('index');
Route::get('/post/{post}', [DefaultController::class, 'viewPost'])->name('post.view');
