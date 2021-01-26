<div>
  <h3 class="card-title mb-3">
    Listado de Compañías

    <button wire:click="create()" class="btn btn-primary float-right" data-toggle="modal"
    data-target="#addEditModal">
      <i class="fa fa-plus-circle mr-1"></i>{{ __('Add new company') }}
    </button>
  </h3>

  @if (session('message'))
    @include('includes._messages')
  @endif

  @if (! $companies->isEmpty())
    <div class="table-responsive-sm">
      <table class="table table-hover">
        <thead>
          <tr class="text-center">
          <th>ID</th>
          <th>{{ __('Title') }}</th>
          <th>{{ __('Actions') }}</th>
          </tr>
        </thead>
        <tbody>
          @foreach($companies as $company)
            <tr>
              <td class="text-center">{{ $company->id }}</td>
              <td>{{ Str::limit($company->title, 25) }}</td>
              <td class="text-center" style="display-inline">
                <a wire:click.prevent="edit({{ $company->id }})" title="Actualizar" data-toggle="modal" data-target="#addEditModal">
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

  <!-- Modal -->
  @if($isOpen)
    <div wire:ignore.self class="modal fade" id="addEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">{{ __('Add new company') }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true close-btn">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group">
                <label for="titleInput">{{ __('Title') }}:</label>
                <input wire:model="title" type="text" class="form-control @error('title') is-invalid @enderror" id="titleInput" placeholder="{{ __('Enter title') }}">
                @error('title')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
              </div>
            </form> 
          </div>
          <div class="modal-footer">
            <button wire:click="closeModal()" type="button" class="btn btn-secondary close-btn" data-dismiss="modal">{{ __('Cancel') }}</button>
            <button wire:click.prevent="store()" type="button" class="btn btn-primary">{{ __('Save changes') }}</button>
          </div>
        </div>
      </div>
    </div>
  @endif
</div>