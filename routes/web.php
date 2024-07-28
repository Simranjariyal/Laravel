<?php

use Illuminate\Support\Facades\Route;
use Livewire\Livewire;
use App\Livewire\Admin;
use App\Http\Controllers\ProductController;

Route::resource('products', ProductController::class);

Route::get('/', function () {
    return view('welcome');
});

// Define the route using the Livewire component
Route::get('/admin', Admin::class);

