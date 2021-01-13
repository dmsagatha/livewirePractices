<?php

use App\Http\Controllers\OrderController;
use App\Http\Livewire\Users;
use Illuminate\Support\Facades\Route;

/* Route::get('/', function () {
  return view('welcome');
}); */

Route::resource('orders', OrderController::class);

//https://www.nicesnippets.com/blog/laravel-livewire-crud-with-bootstrap-modal-example
//Route::view('users', 'livewire.users.index');
//Route::get('users', Users::class);

Route::get('/', function () {
  return view('users.users');
});
