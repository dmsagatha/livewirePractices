<!-- Modal -->
<div wire:ignore.self class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Crear Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true close-btn">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="">Nombre:</label>
            <input type="text" class="form-control" wire:model="name">
            @error('name') <span class="text-danger error">{{ $message }}</span> @enderror
          </div>
          
          <div class="form-group">
            <label for="">Correo Electrónico:</label>
            <input type="email" class="form-control" wire:model="email">
            @error('email') <span class="text-danger error">{{ $message }}</span> @enderror
          </div>
          
          <div class="form-group">
            <label for="">Contraseña:</label>
            <input type="password" class="form-control" wire:model="password">
            @error('password') <span class="text-danger error">{{ $message }}</span> @enderror
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" wire:click.prevent="store()">Guardar cambios</button>
      </div>
    </div>
  </div>
</div>