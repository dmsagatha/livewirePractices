@extends('layouts.app')

@section('content')
  <div class="card">
    <h1 class="card-header text-center">CRUD de Usuarios con Modal</h1>

    <div class="card-body">
      @livewire('users-modal')
    </div>
  </div>
@endsection