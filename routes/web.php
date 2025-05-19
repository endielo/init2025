<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocumentController;

use App\Http\Controllers\CustomerController;

Route::get('/', function () {
    return inertia('Welcome');
});

Route::resource('customers', CustomerController::class);
Route::resource('documents', DocumentController::class);