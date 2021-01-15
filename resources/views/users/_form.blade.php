<div class="form-group">
  <label for="">Nombre:</label>
  <input type="text" class="form-control" wire:model="name">
  @error('name') <span class="text-danger">{{ $message }}</span> @enderror
</div>

<div class="form-group">
  <label for="">Correo Electrónico:</label>
  <input type="email" class="form-control" wire:model="email">
  @error('email') <span class="text-danger">{{ $message }}</span> @enderror
</div>

<div class="form-group">
  <label for="">Contraseña:</label>
  <input type="password" class="form-control" wire:model="password">
  @error('password') <span class="text-danger">{{ $message }}</span> @enderror
</div>