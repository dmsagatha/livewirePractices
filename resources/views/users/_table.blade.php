<h4 class="card-header font-italic">Listado de Usuarios</h4>

<div class="card-body">
  <div class="table-responsive-sm">
    <table class="table table-sm table-bordered table-hover">
      <thead class="table-dark">
        <tr class="text-center">
          <th>No.</th>
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
            <td class="text-center" style="display-inline">
              <a wire:click="edit({{ $value->id }})" class="teal-text" title="Actualizar">
                <i class="fas fa-pencil-alt"></i>
              </a>
              <a type="button"
                wire:click="destroy({{ $value->id }})" class="btn-sm text-danger" title="Eliminar">
                <i class="fa fa-times"></i>
              </a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </div>
  </table>

  {{ $users->links() }}
</div>