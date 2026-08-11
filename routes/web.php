<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\WarehouseController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('customers', CustomerController::class)
    ->only(['index', 'create', 'store', 'destroy']);

Route::resource('warehouses', WarehouseController::class)
    ->only(['index', 'create', 'store']);
