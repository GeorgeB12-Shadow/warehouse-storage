<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\StorageLocationController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('customers', CustomerController::class)
    ->only(['index', 'create', 'store', 'destroy']);

Route::resource('warehouses', WarehouseController::class)
    ->only(['index', 'create', 'store']);

Route::resource('storage-locations', StorageLocationController::class)
    ->only(['index', 'create', 'store']);
