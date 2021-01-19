<div>
  <h3 class="card-title">
    Listado de Empresas
    
    {{-- <button wire:click="create()" class="btnt btn-success text-white font-bold py-2 px-4 rounded mt-10">Crear nueva Empresa</button> --}}

    <!-- Button trigger modal -->
    <button wire:click="create()" type="button" class="btn btn-primary justify-content-end" data-toggle="modal" data-target="#exampleModal">
      <i class="fa fa-plus-circle mr-1"></i>Crear nueva Empresa
    </button>
  </h3>

  @if (session()->has('message'))
    <div class="alert alert-success" style="margin-top:30px;">x
      <span class="inline-block align-middle mr-8">
        {{ session('message') }}
      </span>
      <button class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none" onclick="document.getElementById('alert').remove();">
          <span>×</span>
      </button>
    </div>
  @endif

  @if (! $companies->isEmpty())
    <div class="table-responsive-sm">
      <table class="table table-sm table-bordered table-hover">
        <thead class="table-dark">
          <tr class="text-center">
          <th>ID</th>
          <th>Nombre</th>
          <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach($companies as $value)
          <tr>
            <td>{{ $value->id }}</td>
            <td>{{ Str::limit($value->title, 25) }}</td>
            <td class="text-center" style="display-inline">
              <a wire:click="edit({{ $value->id }})" class="teal-text" title="Actualizar" data-toggle="modal" data-target="#updateUserModal">
                <i class="fa fa-edit"></i>
              </a>
              <a type="button"
                wire:click="$emit('triggerDelete',{{ $value->id }})" class="btn-sm text-danger" title="Eliminar">
                <i class="fa fa-trash"></i>
              </a>
              {{-- <div class="inline-block whitespace-no-wrap">
                <button wire:click="edit({{ $value->id }})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Editar</button>
                <button wire:click="$emit('triggerDelete',{{ $value->id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Eliminar</button>
              </div> --}}
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  @else
  <h5>No hay registros creados</h5>
  @endif

  {{ $companies->links() }}

  @if($isOpen)
    <x-customised-modal>
      <x-slot name="content">
        <form>
          <div class="px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
            <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
              <label for="titleInput" class="block text-gray-700 text-sm font-bold mb-2">Nombre:</label>
              <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="titleInput" placeholder="Ingrese el Nombre" wire:model="title">
              @error('title') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
            </div>
          </div>
          <div class="px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
            <span class="flex w-full sm:ml-3 sm:w-auto">
            <button wire:click.prevent="store()" type="button" class="btn btn-info rounded">Guardar</button>
            </span>
            <span class="mt-3 flex w-full sm:mt-0 sm:w-auto">
            <button wire:click="closeModal()" type="button" class="inline-flex bg-white hover:bg-gray-200 border border-gray-300 text-gray-500 font-bold py-2 px-4 rounded">Cancelar</button>
            </span>
          </div>
        </form> 
      </x-slot>
    </x-customised-modal>
  @endif
</div>

@push('styles')
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">
@endpush

@push('scripts')
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>

  <script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function () {
      @this.on('triggerDelete', companyId => {
        Swal.fire({
          title: 'Esta seguro?',
          text: 'Se eliminará el registro de la empresa!',
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
