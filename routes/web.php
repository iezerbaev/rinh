<?php

use App\Http\Controllers\Api\V1\FileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth:sanctum')->prefix('/cabinet')->group(function () {
    Route::get('/', [\App\Http\Controllers\Inertia\HomeController::class, 'index'])->name('dashboard');
    Route::prefix('/project')->name('project.')->group(function () {
        Route::get('/', [\App\Http\Controllers\Inertia\ProjectController::class, 'index'])
            ->name('index');
    });
    Route::prefix('/profile/api/v1/')->name('v1.')->group(function () {
        Route::prefix('/thumbnail')->name('thumbnail.')->group(function () {
            Route::post('/', [FileController::class, 'upload'])->name('upload');
            Route::delete('/', [FileController::class, 'delete'])->name('delete');
        });
    });
});
