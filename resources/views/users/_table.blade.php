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
          <button wire:click="destroy({{ $value->id }})" class="btn btn-danger">Eliminar</button>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>

{{ $users->links() }}</p>