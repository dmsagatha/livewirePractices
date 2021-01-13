<h2>Listado de Usuarios</h2>

<table class="table table-bordered mt-5">
  <thead>
    <tr>
      <th>No.</th>
      <th>Name</th>
      <th>Email</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($users as $value)
      <tr>
        <td>{{ $value->id }}</td>
        <td>{{ $value->name }}</td>
        <td>{{ $value->email }}</td>
        <td>
          Acciones
        </td>
      </tr>
    @endforeach
  </tbody>
</table>

{{ $users->links() }}</p>