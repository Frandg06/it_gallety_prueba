<?php

use App\Http\Controllers\ApiControllers\GalleryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/works', [GalleryController::class, 'index']);
Route::get('/works/{id}', [GalleryController::class, 'show']);
Route::post('/works/{id}', [GalleryController::class, 'update']);
