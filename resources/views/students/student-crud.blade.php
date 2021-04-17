<div>
  <h2 class="card-header text-center">
    CRUD de Estudiantes <br> con Buscador <br>
  </h2>

  <h5 class="text-center">
    <a href="https://www.youtube.com/watch?v=dkU1cgCjhIc&list=PLIeKz8l1eVaO6PE_k18HHHVyf0sbtceZm&index=2" target="_blank">
      Programming with Singhateh - <br>
      How to Create Laravel Livewire Complete Step by Step CRUD Application (Livewire Installation)</a>
  </h5>
  
  <div class="card-header bg-dark text-white">
    <b style="text-transform: uppercase">Lista de Estudiantes</b>

    <div style="float:right">
      <input wire:model="search" type="text" class="form-control ml:1px" placeholder="Buscar aquí......">
    </div>
    <br><br>
  </div>

  <div class="card-body">
    @if(session()->has('message'))
      <div class="alert alert-success">
        {{ session('message') }}
      </div>
    @endif
    @if ($messageText != '')
        <div class="alert alert-info">
            {{ $messageText }}
        </div>
    @endif

    @if($UpdateStudent)
      @include('students.update')
    @else
      @include('students.create')
    @endif

    <div class="table-responsive">
      <table class="table align-middle table-striped table-hover table-bordered dt-responsive nowrap">
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
          @foreach($students as $row)
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
                <a wire:click="destroy({{ $row->id }})" onclick="confirm('Va a eliminar el registro?') || event.stopImmediatePropagation()"
                href="#!" title="Eliminar">
                  <i class="far fa-trash-alt text-danger"></i>
                </a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div><!-- /card-body -->
</div>