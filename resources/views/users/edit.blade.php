<h3 class="pb-4 mb-4 font-italic">
 Editar Usuario
</h3>

@include('users._form')

<button wire:click="update" class="btn btn-primary">
  Actualizar
</button>

<button wire:click="default" class="btn btn-link">
  Cancelar
</button>