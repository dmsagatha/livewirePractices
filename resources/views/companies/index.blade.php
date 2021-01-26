@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="card">
      <h2 class="card-header text-center">
        CRUD de Usuarios <br> con Modal y Buscador <br>
      </h2>

      <h5 class="text-center">
        <a href="https://dev.to/dariusdauskurdis/laravel-8-crud-basic-steps-livewire-and-tailwind-10b">dev.to - Laravel 8 - CRUD basic steps</a>
      </h5>

      <div class="card-body">
        @livewire('companies')
      </div>
    </div>
  </div>
@endsection