<div class="form-row">
  <div class="form-group col-md-4">
    <label for="firstname">Nombres</label>
    <input wire:model="fname" type="text" class="form-control @error('fname') is-invalid @enderror" id="fname" placeholder="Ingrese los Nombres">
    @error('fname')
      <span class="invalid-feedback" role="alert">{{ $message }}</span>
    @enderror
  </div>

  <div class="form-group col-md-4">
    <label for="lastname">Apellidos</label>
    <input wire:model="lname" type="text" class="form-control @error('fname') is-invalid @enderror" id="lname" placeholder="Ingrese los Apellidos">
    @error('lname')
      <span class="invalid-feedback" role="alert">{{ $message }}</span>
    @enderror
  </div>

  <div class="form-group col-md-4">
    <label for="email">Correo Electrónico</label>
    <input type="email" wire:model="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Ingrese el Correo Electrónico">
    @error('email')
      <span class="invalid-feedback" role="alert">{{ $message }}</span>
    @enderror
  </div>
</div>

<div class="form-row">
  <div class="form-group col-md-4">
    <label for="phone">Telefóno</label>
    <input type="numeric" wire:model="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="N° de celular">
    @error('phone')
      <span class="invalid-feedback" role="alert">{{ $message }}</span>
    @enderror
  </div>

  <div class="form-group col-md-4">
    <label for="gender">Género</label>
    <select id="gender" wire:model="gender" class="form-control @error('gender') is-invalid @enderror">
      <option selected>Seleccionar...</option>
      <option value="0">Masculino</option>
      <option value="1">Femenino</option>
    </select>
    @error('gender')
      <span class="invalid-feedback" role="alert">{{ $message }}</span>
    @enderror
  </div>
</div>