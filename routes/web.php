<?php

use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

/* Route::get('/', function () {
  return view('welcome');
}); */

Route::resource('orders', OrderController::class);

// Rimorsoft Online - Dos opciones
Route::view('/', 'users.users')->name('users');

//https://www.nicesnippets.com/blog/laravel-livewire-crud-with-bootstrap-modal-example
// https://www.youtube.com/watch?v=nnK1PdtAX_M
Route::view('/users-modal', 'users-modal.users')->name('usersModal');
