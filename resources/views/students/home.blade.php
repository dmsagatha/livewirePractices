@extends('layouts.app')

@section('title', 'CRUD Estudiantes')

@section('content')
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <h2 class="card-header text-center">
            CRUD de Estudiantes <br> con Buscador <br>
          </h2>
    
          <h5 class="text-center">
            <a href="https://www.youtube.com/watch?v=dkU1cgCjhIc&list=PLIeKz8l1eVaO6PE_k18HHHVyf0sbtceZm&index=2" target="_blank">
              Programming with Singhateh - <br>
              How to Create Laravel Livewire Complete Step by Step CRUD Application (Livewire Installation)</a>
          </h5>
          <div class="card-header bg-dark text-white">
            <b style="text-transform: uppercase">Lista de Estudiantes</b>
          </div>
          <div class="card-body">
            @livewire('student-crud')
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection