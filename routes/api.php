<?php

use App\Http\Controllers\ApiControllers\GalleryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/getAll', [GalleryController::class, 'index']);
Route::get('/specific/{id}', [GalleryController::class, 'getSpecificItem']);
Route::post('/update', [GalleryController::class, 'update']);
