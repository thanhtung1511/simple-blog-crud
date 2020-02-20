<?php

use App\Http\Controllers\Frontend\User\DashboardController;
use App\Http\Controllers\Frontend\User\UserController;

/*
 * These frontend controllers require the user to be logged in
 * All route names are prefixed with 'frontend.'
 * These routes can not be hit if the password is expired
 */
Route::namespace('User')->middleware(['auth'])->as('user.')->group(function () {
    // User Dashboard Specific
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // User Account Specific
    Route::get('account', [UserController::class, 'index'])->name('account');

    // Change Password Route
    Route::patch('password/update', [UserController::class, 'updatePassword'])->name('password.update');

    // User Profile Specific
    Route::patch('profile/update', [UserController::class, 'updateProfile'])->name('profile.update');
});

