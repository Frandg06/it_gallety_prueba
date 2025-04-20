<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/{id}', function () {
    return view('show');
})->name('specificItem');

Route::get('/edit/{id}', function () {
    return view('edit');
})->name('edit');
