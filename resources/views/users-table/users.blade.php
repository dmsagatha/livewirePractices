@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="card">
      <h1 class="card-header text-center">Tabla de datos de Usuarios</h1>

      <div class="card-body">
        @livewire('users-table')
      </div>
    </div>
  </div>
@endsection