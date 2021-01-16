@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12 mt-3">
        <h1 class="text-center">CRUD de Usuarios</h1>

        @livewire('users-crud')
      </div>
    </div>
  </div>
@endsection