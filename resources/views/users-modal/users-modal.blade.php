<div>
  <h3 class="card-title">
    Listado de usuarios

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addUserModal">
      Crear Usuario
    </button>
  </h3>

    @include('users-modal.create')

    @if (session()->has('message'))
      <div class="alert alert-success" style="margin-top:30px;">x
        {{ session('message') }}
      </div>
    @endif

  @if (! $users->isEmpty())
    <div class="table-responsive-sm">
      <table class="table table-sm table-bordered table-hover">
        <thead class="table-dark">
          <tr class="text-center">
            <th>ID</th>
            <th>Nombre Completo</th>
            <th>Correo Electrónico</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach($users as $value)
            <tr>
              <td>{{ $value->id }}</td>
              <td>{{ $value->name }}</td>
              <td>{{ $value->email }}</td>
              <td class="text-center">Acciones</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  @else
    <h5>No hay registros creados</h5>
  @endif

  {{ $users->links() }}
</div>