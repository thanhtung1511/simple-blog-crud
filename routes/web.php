<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
 * Frontend Routes
 */
Route::namespace('Frontend')
    ->as('frontend.')
    ->group(function () {
        include_files_in_folder(__DIR__.'/frontend/');
    });
