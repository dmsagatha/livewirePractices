@extends('layouts.app')

@section('title', 'CRUD Estudiantes')

@section('content')
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          @livewire('student-crud')
        </div>
      </div>
    </div>
  </div>
@endsection