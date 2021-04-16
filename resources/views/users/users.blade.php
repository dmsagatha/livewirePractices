@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12 mt-3">
        <h1 class="text-center">CRUD de Usuarios</h1>

	      <h5 class="text-center">
	        <a href="https://www.youtube.com/channel/UCRByhHailXC3HqWL2QrYw7w/playlists" target="_blank">Rimorsoft Online - CRUD con LIVEWIRE</a>
	      </h5>

        @livewire('users-crud')
      </div>
    </div>
  </div>
@endsection