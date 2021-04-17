<form>
  <input type="hidden" wire:model="student_id">

  @include('students._form')
  
  <button type="submit" wire:click.prevent="update" style="float:right; margin-right: 1%; margin-bottom:3px" class="btn btn-dark" >Actualizar</button>
</form>