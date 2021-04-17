<?php

use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

/* Route::get('/', function () {
  return view('welcome');
}); */

Route::resource('orders', OrderController::class);

// UsersCrud
// Rimorsoft Online
Route::view('/', 'users.users')->name('users');

// UsersModal
// https://www.nicesnippets.com/blog/laravel-livewire-crud-with-bootstrap-modal-example
// Surfside Media - https://www.youtube.com/watch?v=nnK1PdtAX_M
Route::view('/users-modal', 'users-modal.users')->name('usersModal');

// UsersTable
// https://laracasts.com/series/guest-spotlight/episodes/3
// Clovo - https://www.youtube.com/watch?v=CBL17MxWi_4
Route::view('/users-table', 'users-table.users')->name('usersTable');

// ProductsModal
 // https://github.com/LaravelDaily/LivewireKit-Components/tree/main/05-crud-with-modal/demo
Route::view('products-modal', 'products-modal.index')->name('productsModal');

// Companies
// https://dev.to/dariusdauskurdis/laravel-8-crud-basic-steps-livewire-and-tailwind-10b
Route::view('companies', 'companies.index')->name('companiesModal');

// StudentCrud
// https://futureprogrammers.ga/laravel-livewire-crud-project-step-by-step/?i=1
// Programming with Singhateh
Route::view('students','students.home')->name('students');