<?php

use App\Http\Controllers\OrderController;
use App\Http\Livewire\Users;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  return view('welcome');
});

Route::resource('orders', OrderController::class);

// Rimorsoft Online - Dos opciones
Route::view('/users', 'users.users');

//https://www.nicesnippets.com/blog/laravel-livewire-crud-with-bootstrap-modal-example
//Route::get('users', Users::class);
