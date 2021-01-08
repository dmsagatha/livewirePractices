@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">

        @if ($errors->any())
          <ul>
            @foreach ($errors as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        @endif

        <div class="card">
          <div class="card-header">Pedidos</div>
          
          <div class="card-body">
            @livewire('products')
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection