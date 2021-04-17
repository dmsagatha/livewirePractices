<div>
  @if($UpdateStudent)
    @include('students.update')
  @else
    @include('students.create')
  @endif

  <div class="table-responsive">
    <table class="table">
      <thead>
        <th>#</th>
        <th>Nombres</th>
        <th>Apellidos</th>
        <th>Correo Electrónico</th>
        <th>Género</th>
        <th>N° de Celular</th>
        <th>Creación</th>
        <th>Actualización</th>
        <th colspan="3">Acciones</th>
      </thead>
      <tbody>
        @foreach($data as $row)
          <tr>
            <td>{{ $row->id }}</td>
            <td>{{ $row->firstname }}</td>
            <td>{{ $row->lastname }}</td>
            <td>{{ $row->email }}</td>
            <td>@if ($row->gender== 0)Masculino @else Femenino @endif</td>
            <td>{{ $row->phone }}</td>
            <td>{{ $row->created_at->diffForHumans() }}</td>
            <td>{{ $row->updated_at->diffForHumans() }}</td>
            <td>
              <a wire:click="edit({{ $row->id }})" href="#!" title="Actualizar">
                <i class="fas fa-marker text-primary me-2"></i>
              </a>
              <a href="#!" title="Eliminar">
                <i class="far fa-trash-alt text-danger"></i>
              </a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>