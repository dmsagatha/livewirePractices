<form>
  @include('students._form')
  
  <button type="submit" wire:click.prevent="insert" style="float:right; margin-right:1%; margin-bottom:3px" class="btn btn-primary" >Crear</button>
</form>