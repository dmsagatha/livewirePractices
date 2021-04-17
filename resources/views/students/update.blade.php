<form>
  <div class="form-row">
    <input type="hidden" wire:model="student_id">
    <div class="form-group col-md-4">
      <label for="firstname">Nombres</label>
      <input wire:model="fname" type="text" class="form-control" id="fname" placeholder="Ingrese los Nombres">
      @error('fname') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group col-md-4">
      <label for="email">Apellidos</label>
      <input type="text" wire:model="lname" class="form-control" id="lastname" placeholder="Ingrese los Apellidos">
      @error('lname') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group col-md-4">
      <label for="email">Correo Electrónico</label>
      <input type="email" wire:model="email" class="form-control" id="email" placeholder="Ingrese el Correo Electrónico">
      @error('email') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="phone">Telefóno</label>
      <input type="numeric" wire:model="phone" class="form-control" placeholder="N° de celular">
      @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group col-md-4">
      <label for="gender">Género</label>
      <select id="gender" wire:model="gender" class="form-control">
        <option selected>Seleccionar...</option>
        <option value="0">Masculino</option>
        <option value="1">Femenino</option>
      </select>
      @error('gender') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
  </div>
  
  <button type="submit" wire:click.prevent="update" style="float:right; margin-right: 1%; margin-bottom:3px" class="btn btn-dark" >Actualizar</button>
</form>