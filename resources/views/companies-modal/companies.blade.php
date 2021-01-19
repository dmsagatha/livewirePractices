@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="card">
      <h1 class="card-header text-center">CRUD de Empresas con Modal</h1>

      <div class="card-body">
        @livewire('companies-modal')
      </div>
    </div>
  </div>
@endsection