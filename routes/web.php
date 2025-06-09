<?php

use App\Http\Controllers\MaterialController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::resource('materials', MaterialController::class);
Route::get('materials/products/{id}', [MaterialController::class, 'products'])->name('materials.products');
