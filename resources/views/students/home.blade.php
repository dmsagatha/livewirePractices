@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header bg-dark text-white">
            <b style="text-transform: uppercase">Lista de Estudiantes</b>
            <div style="float:right">
              <input type="text" wire:model="search" wire:model="search"
                class="form-control ml:1px" placeholder="Buscar......"></div>

            @if(session()->has('message'))
              <div class="alert alert-success">
                {{ session('message') }}
              </div>
            @endif
          </div>
          <div class="card-body">
            @livewire('student-crud')
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection