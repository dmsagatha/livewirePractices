<div>
  <h3 class="card-title mb-3">
    Listado de usuarios
    <button wire:click.prevent="addNew" class="btn btn-primary float-right" data-toggle="modal"
      data-target="#addUserModal">
      <i class="fa fa-plus-circle mr-1"></i>{{ __('Add new user') }}
    </button>
  </h3>
  
  {{-- @if (session('message'))
    @include('includes._messages')
  @endif --}}

  <div class="row mb-4">
    <div class="col">
      <input wire:model="search" type="text" class="form-control" placeholder="Buscar ....">
    </div>

    <div class="col form-inline justify-content-end">
      Por página: &nbsp;
      <select wire:model="perPage" class="form-control">
        <option>10</option>
        <option>15</option>
        <option>25</option>
        <option>50</option>
        <option>75</option>
        <option>100</option>
      </select>
    </div>

    @if ($search !== '')
      <button wire:click="clearSearch" class="form-input rounded-md shadow-sm mr-3 block">
        <i class="fa fa-times fa-spin"></i>
      </button>
    @endif
  </div>

  @if (! $users->isEmpty())
    <div class="table-responsive-sm">
      <table class="table table-hover">
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
                {{ __('Name') }}
                @include('includes._sort-icon', ['field' => 'name'])
              </a>
            </th>
            <th>
              <a wire:click.prevent="sortBy('email')" href="#">
                {{ __('Email') }}
                @include('includes._sort-icon', ['field' => 'email'])
              </a>
            </th>
            <th>
              <a wire:click.prevent="sortBy('created_at')" href="#">
                {{ __('Created at') }}
                @include('includes._sort-icon', ['field' => 'created_at'])
              </a>
            </th>
            <th>{{ __('Actions') }}</th>
          </tr>
        </thead>
        <tbody>
          @foreach($users as $user)
            <tr>
              <td class="text-center">{{ $user->id }}</td>
              <td>
                <a wire:click.prevent="show({{ $user->id }})" href="#">{{ $user->name }}</a>
              </td>
              <td>{{ $user->email }}</td>
              <td class="text-center">{{ $user->created_at->format('Y-m-d') }}</td>
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
  <div wire:ignore.self class="modal fade" id="form" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
      <form autocomplete="off" wire:submit.prevent="createUser">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">{{ __('Add new user') }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="name">{{ __('Full name') }}:</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" wire:model.defer="state.name"
                id="name" aria-describedby="nameHelp" placeholder="{{ __('Enter full name')}}">
              @error('name')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="form-group">
              <label for="email">{{ __('Email') }}:</label>
              <input type="text" class="form-control @error('email') is-invalid @enderror"
                wire:model.defer="state.email" id="email" aria-describedby="emailHelp"
                placeholder="{{ __('Enter email')}}">
              @error('email')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="form-group">
              <label for="password">{{ __('Password') }}:</label>
              <input type="password" class="form-control @error('password') is-invalid @enderror"
                wire:model.defer="state.password" id="password">
              @error('password')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="form-group">
              <label for="passwordConfirmation">{{ __('Confirm Password') }}:</label>
              <input type="password" class="form-control" wire:model.defer="state.password_confirmation"
                id="passwordConfirmation">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Cancel') }}</button>
            <button type="submit" class="btn btn-primary">{{ __('Save changes') }}</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <!-- Modal para mostrar un Usuario -->
  <div class="modal" @if ($showModal) style="display:block" @endif>
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Mostrar Usuario: {{ $user->name}}</h5>
          <button wire:click="close" type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="table-responsive">
            <table class="table table-hover" style="width: 100%">
              <tbody>
                <tr>
                  <th>{{ __('Name') }}:</th>
                  <td>{{ $user->name}}</td>
                </tr>
                <tr>
                  <th>{{ __('Email') }}:</th>
                  <td>{{ $user->email}}</td>
                </tr>
                <tr>
                  <th>{{ __('Created at') }}:</th>
                  <td>{{ $user->created_at}}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="modal-footer">
          <button wire:click="close" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar
          </button>
        </div>
      </div>
    </div>
  </div>
</div>