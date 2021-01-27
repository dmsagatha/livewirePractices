@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="card">
      <h2 class="card-header text-center">
        CRUD de Publicaciones <br> con Modal<br>
      </h2>

      <h5 class="text-center">
        <a href="https://www.youtube.com/watch?v=_DQi8TyA9hI" target="_blank">Jack of Traits - Laravel Livewire Tutorial: Adding Modal, Event Listeners, & Delete (part 3)</a>
      </h5>

      <div class="card-body">
        @livewire('posts')
      </div>
    </div>
  </div>
@endsection