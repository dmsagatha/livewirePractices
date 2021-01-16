<h4 class="card-header font-italic">Nuevo Usuario</h4>

<div class="card-body">
  @include('users._form')

  <button wire:click="store" class="btn btn-primary">
    Guardar
  </button>
</div>