<div>
  {{-- <input wire:model="search" type="text" placeholder="Buscar...">

  {{ $search }}

  <button wire:click="clear">Limpiar</button> --}}
  
  <h3 class="card-title">
    Listado de usuarios

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addUserModal">
      Crear Usuario
    </button>
  </h3>

  <div class="row mb-4">
    <div class="col form-inline">
      Por página: &nbsp;
      <select wire:model="perPage" class="form-control">
        <option>10</option>
        <option>15</option>
        <option>25</option>
      </select>
    </div>

    <div class="col">
      <input type="text" class="form-control" placeholder="Buscar ....">
    </div>
  </div>

  @if (! $users->isEmpty())
    <div class="table-responsive-sm">
      <table class="table table-sm table-hover">
        <thead>
          <tr class="text-center">
            <th>
              <a wire:click.prevent="sortBy('id')" href="#">
                ID
                @include('includes._sort-icon', ['field' => 'id'])
              </a>
            </th>
            <th>
              <a wire:click.prevent="sortBy('name')" href="#">
                NOMBRE COMPLETO
                @include('includes._sort-icon', ['field' => 'name'])
              </a>
            </th>
            <th>
              <a wire:click.prevent="sortBy('email')" href="#">
                CORREO ELECTRONICO
                @include('includes._sort-icon', ['field' => 'email'])
              </a>
            </th>
          </tr>
        </thead>
        <tbody>
          @foreach($users as $value)
            <tr>
              <td>{{ $value->id }}</td>
              <td>{{ $value->name }}</td>
              <td>{{ $value->email }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  @else
    <h5>No hay registros creados</h5>
  @endif

  <div class="row">
    <div class="col">
      {{ $users->links() }}
    </div>

    <div class="col text-right text-muted">
      Mostrar {{ $users->firstItem() }} de {{ $users->lastItem() }} de {{ $users->total() }}
    </div>
  </div>
</div>