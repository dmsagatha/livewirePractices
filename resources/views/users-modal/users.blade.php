@extends('layouts.app')

@section('content')
    <h3>Información de los usuarios</h3>

    <div>
      @livewire('users-modal')
    </div>
@endsection