@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="card">
      <h1 class="card-header text-center">Listado de Productos</h1>

      <div class="card-body">
        @livewire('products-modal')
      </div>
    </div>
  </div>
@endsection