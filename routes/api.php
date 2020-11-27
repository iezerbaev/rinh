<?php

use App\Http\Controllers\Api\V1\FileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/v1/')->name('v1.')->group(function () {
    Route::middleware('autg:sanctum')->group(function () {
        Route::put('/thumbnail', [FileController::class, 'upload'])->name('thumbnail.upload');
        Route::delete('/thumbnail', [FileController::class, 'delete'])->name('thumbnail.delete');
    });
});
