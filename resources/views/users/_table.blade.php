<h2>Listado de Usuarios</h2>

<table class="table table-bordered mt-5">
  <thead>
    <tr class="text-center">
      <th>No.</th>
      <th>Nombre</th>
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
</table>

{{ $users->links() }}</p>