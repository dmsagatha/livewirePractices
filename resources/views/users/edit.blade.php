<h4 class="card-header font-italic">Editar Usuario</h3>

<div class="card-body">
  @include('users._form')

  <button wire:click="update" class="btn btn-primary">
    Actualizar
  </button>

  <button wire:click="default" class="btn btn-link">
    Cancelar
  </button>
</div>