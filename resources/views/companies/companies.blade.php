<div>
  <h3 class="card-title mb-3">
    Listado de Compañías

    <a wire:click.prevent="create" href="#" class="btn btn-primary float-right">
      <i class="fa fa-plus-circle mr-1"></i>{{ __('Add new company') }}
    </a>
  </h3>

  @if (session('message'))
    @include('includes._messages')
  @endif

  <div class="row mb-4">
    <div class="col">
      <input wire:model.debounce.800ms="search" type="text" class="form-control" placeholder="Buscar ....">
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

  @if (! $companies->isEmpty())
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
              <a wire:click.prevent="sortBy('title')" href="#">
                {{ __('Title') }}
                @include('includes._sort-icon', ['field' => 'title'])
              </a>
            </th>
            <th>{{ __('Actions') }}</th>
          </tr>
        </thead>
        <tbody>
          @foreach($companies as $company)
            <tr>
              <td class="text-center">{{ $company->id }}</td>
              <td>{{ $company->title }}</td>
              <td class="text-center" style="display-inline">
                <a wire:click.prevent="edit({{ $company->id }})" title="Actualizar"  class="teal-text">
                  <i class="fa fa-edit mr-2"></i>
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
      {{ $companies->links() }}
    </div>

    <div class="col text-right text-muted">
      Mostrar {{ $companies->firstItem() }} de {{ $companies->lastItem() }} de {{ $companies->total() }}
    </div>
  </div>

  <div class="modal" @if ($showModal) style="display:block" @endif>
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form wire:submit.prevent="store">
          <div class="modal-header">
            <h5 class="modal-title">{{ $company_id ? 'Editar compañía' : 'Crear nueva compañía' }}</h5>
            <button wire:click="closeModal" type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="titleInput">{{ __('Title') }}:</label>
              <input wire:model.lazy="title" type="text" class="form-control @error('title') is-invalid @enderror" id="titleInput" placeholder="{{ __('Enter title') }}">
              @error('title')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">{{ __('Save changes') }}</button>
            <button wire:click="closeModal" type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>