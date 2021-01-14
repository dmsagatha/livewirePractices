<h3>Nuevo Usuario</h3>

@include('users._form')

<button wire:click="update" class="btn btn-primary">
  Actualizar
</button>

<button wire:click="default" class="btn btn-link">
  Cancelar
</button>