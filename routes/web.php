<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SantriController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});


Route::controller(ProductController::class)->group(function () {
    Route::get('/products', 'index')->name('products.index');
    Route::get('/products/create', 'create')->name('products.create');
    Route::get('/products/create1', 'create')->name('products.create');
    Route::post('/products', 'store')->name('products.store');
    Route::get('/products/{product}/edit', 'edit')->name('products.edit');
    Route::put('/products/{product}', 'update')->name('products.update');
    Route::delete('/products/{product}', 'destroy')->name('products.destroy');
});

Route::controller(SantriController::class)->group(function () {
    Route::get('/santris', 'index')->name('santris.index');
    Route::get('/santris/create', 'create')->name('santris.create');
    Route::post('/santris', 'store')->name('santris.store');
    Route::get('/santris/{santri}/edit', 'edit')->name('santris.edit');
    Route::put('/santris/{santri}', 'update')->name('santris.update');
    Route::delete('/santris/{santri}', 'destroy')->name('santris.destroy');
});
