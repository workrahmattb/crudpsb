<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SantriController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\MtsputriController;


Route::get('/', [WelcomeController::class, 'index']);


Route::controller(PendaftaranController::class)->group(function () {
    Route::get('/pendaftarans', 'index')->name('pendaftarans.index');
    Route::get('/pendaftarans/create', 'create')->name('pendaftarans.create');

    Route::post('/pendaftarans', 'store')->name('pendaftarans.store');

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

Route::controller(MtsputriController::class)->group(function () {
    Route::get('/mtsputris', 'index')->name('mtsputris.index');
    Route::get('/mtsputris/create', 'create')->name('mtsputris.create');
    Route::post('/mtsputris', 'store')->name('mtsputris.store');
    Route::get('/mtsputris/{santri}/edit', 'edit')->name('mtsputris.edit');
    Route::put('/mtsputris/{santri}', 'update')->name('mtsputris.update');
    Route::delete('/mtsputris/{santri}', 'destroy')->name('mtsputris.destroy');
});
