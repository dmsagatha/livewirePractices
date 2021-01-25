@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="card">
      <h2 class="card-header text-center">
        CRUD de Usuarios <br> con Modal y Buscador <br>
      </h2>

      <h5 class="text-center">
        <a href="https://www.youtube.com/channel/UChOeAJFpRT0qOIEtIhMsFvw">Clovon - Create Bootstrap Modal popup Form using Laravel Livewire</a>
      </h5>

      <div class="card-body">
        @livewire('users-table')
      </div>
    </div>
  </div>
@endsection