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

// https://laracasts.com/series/guest-spotlight/episodes/3
Route::view('/users-table', 'users-table.users')->name('usersTable');

// https://dev.to/dariusdauskurdis/laravel-8-crud-basic-steps-livewire-and-tailwind-10b
Route::view('/companies', 'companies-modal.companies')->name('companiesModal');