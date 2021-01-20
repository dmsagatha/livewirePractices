<div>
  <h3 class="card-title mb-3">
    Listado de usuarios
    <button wire:click.prevent="addNew" class="btn btn-primary float-right" data-toggle="modal" data-target="#addUserModal">
      <i class="fa fa-plus-circle mr-1"></i>Crear Usuario
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
      <input wire:model="search" type="text" class="form-control" placeholder="Buscar ....">
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
            <th>
              <a wire:click.prevent="sortBy('created_at')" href="#">
                CREACION
                @include('includes._sort-icon', ['field' => 'created_at'])
              </a>
            </th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach($users as $value)
            <tr>
              <td class="text-center">{{ $value->id }}</td>
              <td>{{ $value->name }}</td>
              <td>{{ $value->email }}</td>
              <td class="text-center">{{ $value->created_at->format('Y-m-d') }}</td>
              <td class="text-center" style="display-inline">
                <a href="">
                  <i class="fa fa-edit mr-2"></i>
                </a>
                <a href="">
                  <i class="fa fa-trash text-danger"></i>
                </a>
              </td>
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

  <!-- Modal -->
  <div class="modal fade" id="form" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{ __('Add new user') }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="name">{{ __('Full name') }}:</label>
              <input type="text" class="form-control" wire:model="name" aria-describedby="nameHelp" placeholder="{{ __('Enter full name')}}">
              @error('name') <span class="text-danger error">{{ $message }}</span> @enderror
            </div>
            
            <div class="form-group">
              <label for="email">{{ __('Email') }}:</label>
              <input type="email" class="form-control" wire:model="email" aria-describedby="emailHelp" placeholder="{{ __('Enter email')}}">
              @error('email') <span class="text-danger error">{{ $message }}</span> @enderror
            </div>
            
            <div class="form-group">
              <label for="password">{{ __('Password') }}:</label>
              <input type="password" class="form-control" wire:model="password">
              @error('password') <span class="text-danger error">{{ $message }}</span> @enderror
            </div>
            
            <div class="form-group">
              <label for="passwordConfirmation">{{ __('Confirm Password') }}:</label>
              <input type="password" class="form-control" wire:model="passwordConfirmation">
              @error('password') <span class="text-danger error">{{ $message }}</span> @enderror
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Cancel') }}</button>
          <button type="button" class="btn btn-primary">{{ __('Save changes') }}</button>
        </div>
      </div>
    </div>
  </div>
</div>