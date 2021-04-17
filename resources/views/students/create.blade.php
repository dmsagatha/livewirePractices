<div >
  {{-- <form wire:submit.prevent="insert"> --}}
  <div class="form-row">
    <div class="form-group col-md-3">
      <label for="firstname">Nombres</label>
      <input wire:model="fname" type="text" class="form-control" id="fname"
placeholder="Ingrese los Nombres">
      @error('fname') <span class="text-danger">{{ $message }}</span> @enderror
  </div>
    <div class="form-group col-md-3">
      <label for="lastname">Apellidos</label>
      <input type="text" wire:model="lname" class="form-control" id="lastname" placeholder="Ingrese los Apellidos">
      @error('lname') <span class="text-danger">{{ $message }}</span> @enderror
  </div>

    <div class="form-group col-md-3">
      <label for="phone">Telefóno</label>
      <input type="numeric" wire:model="phone" class="form-control" placeholder="Ingrese N° de celular">
      @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group col-md-2">
      <label for="gender">Género</label>
      <select id="gender" wire:model="gender" class="form-control">
        <option selected>Seleccionar...</option>
        <option value="0">Masculino</option>
        <option value="1">Femenino</option>
      </select>
      @error('gender') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
  </div>
  <button type="submit" wire:click.prevent="insert" style="float:right; margin-right:8%; margin-bottom:3px" class="btn btn-primary" >Crear</button>
  {{-- </form> --}}
</div>