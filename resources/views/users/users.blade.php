@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        CRUD de Usuarios

        @livewire('users-crud')
      </div>
    </div>
  </div>
@endsection