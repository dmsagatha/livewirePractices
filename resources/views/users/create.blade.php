<h3 class="pb-4 mb-4 font-italic">
  Nuevo Usuario
</h3>

@include('users._form')

<button wire:click="store" class="btn btn-primary">
  Guardar
</button>