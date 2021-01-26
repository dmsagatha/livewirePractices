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
              <td>{{ Str::limit($company->title, 25) }}</td>
              <td class="text-center" style="display-inline">
                <a wire:click.prevent="edit({{ $company->id }})" title="Actualizar"  class="teal-text" data-toggle="modal" data-target="#addEditModal">
                  <i class="fa fa-edit mr-2"></i>
                </a>
                <a wire:click="$emit('triggerDelete', {{ $company->id }})" title="Eliminar">
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
      {{ $companies->links() }}
    </div>

    <div class="col text-right text-muted">
      Mostrar {{ $companies->firstItem() }} de {{ $companies->lastItem() }} de {{ $companies->total() }}
    </div>
  </div>

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

@push('scripts')
  <script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function () {
      @this.on('triggerDelete', companyId => {
        Swal.fire({
            title: 'Esta seguro?',
            text: 'Se eliminará el registro de la Compañía!',
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Delete!'
        }).then((result) => {
            if (result.value) {
                @this.call('delete',companyId)
            } else {
                console.log("Canceled");
            }
        });
      });
    })
  </script>
@endpush