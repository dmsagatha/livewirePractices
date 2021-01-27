<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel Livewire') }}</title>

    <link rel="icon" href="{{ asset('/images/favicon.ico') }}">
    
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}" />

    @livewireStyles

    @stack('styles')

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.0/dist/alpine.js" defer></script>
  </head>
  <body class="d-flex flex-column h-100">
    <header>
      <!-- Fixed navbar -->
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
              <li class="nav-item">
                <a class="nav-link {{ request()->is('orders/create') ? 'active' : '' }}" href="{{ route('orders.create') }}">Pedidos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ route('users') }}">Usuarios</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ request()->is('products-modal') ? 'active' : '' }}" href="{{ route('productsModal') }}">Productos Modal</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ request()->is('users-modal') ? 'active' : '' }}" href="{{ route('usersModal') }}">Usuario Modal</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ request()->is('users-table') ? 'active' : '' }}" href="{{ route('usersTable') }}">Usuario Modal-Paginar-Buscar</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ request()->is('companies') ? 'active' : '' }}" href="{{ route('companiesModal') }}">Compañías: Paginar/Buscar y Modal</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <div class="flex-shrink-0">
      <div class="container-fluid pt-5">
        @yield('content')
      </div>
    </div>

    <footer class="container footer mt-auto py-5">
      <div class="row">
        <div class="col-12 col-md">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="d-block mb-2" role="img" viewBox="0 0 24 24"><title>Product</title><circle cx="12" cy="12" r="10"/><path d="M14.31 8l5.74 9.94M9.69 8h11.48M7.38 12l5.74-9.94M9.69 16L3.95 6.06M14.31 16H2.83m13.79-4l-5.74 9.94"/></svg>
          <small class="d-block mb-3 text-muted">&copy; 2021</small>
        </div>
        <div class="col-6 col-md">
          <h5>Features</h5>
          <ul class="list-unstyled text-small">
            <li><a class="link-secondary" href="#">Cool stuff</a></li>
          </ul>
        </div>
        <div class="col-6 col-md">
          <h5>Resources</h5>
          <ul class="list-unstyled text-small">
            <li><a class="link-secondary" href="#">Resource name</a></li>
          </ul>
        </div>
        <div class="col-6 col-md">
          <h5>Resources</h5>
          <ul class="list-unstyled text-small">
            <li><a class="link-secondary" href="#">Business</a></li>
          </ul>
        </div>
        <div class="col-6 col-md">
          <h5>About</h5>
          <ul class="list-unstyled text-small">
            <li><a class="link-secondary" href="#">Team</a></li>
          </ul>
        </div>
      </div>
    </footer>

    <script src="{{ mix('js/app.js') }}"></script>
    <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>

    @stack('modals')

    @livewireScripts

    @stack('scripts')

    <!-- Modal -->
    <x-customised-modal title="Configurar título">
      <div class="alert alert-danger" role="alert">
        <h4 class="alert-heading">{{ __('Well done!') }}</h4>
        <p>{{ __('Are you sure you want to do this?') }}</p>
      </div>
    </x-customised-modal>

    <script>
      $(function(){
        $('.modal').modal();
      });
    </script>

    <script type="text/javascript">
      // $(document).ready(function() {
      jQuery(document).ready(function() {
        toastr.options = {
          "positionClass": "toast-top-right",
          "progressBar": true,
          "timeOut": "1500",
        };

        window.addEventListener('hide-form', event => {
          $('#form').modal('hide');
          toastr.success(event.detail.message, 'Success!');
        });
      });
    </script>

    <script type="text/javascript">
      window.livewire.on('userStore', () => {
        $('#addUserModal').modal('hide');
      });
      window.livewire.on('userUpdated', () => {
        $('#updateUserModal').modal('hide');
      });
    </script>

    <script>
      window.addEventListener('show-form', event => {
        $('#form').modal('show');
      })
    </script>
  </body>
</html>