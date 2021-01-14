<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersCrud extends Component
{
  use WithPagination;

  protected $paginationTheme = 'bootstrap';

  public $name;
  public $email;
  public $password;
  public $view = 'create';

  public function render()
  {
    return view('livewire.users-crud', [
      'users' => User::orderBy('name')->paginate(10)
    ]);
  }

  public function store()
  {
    // Opción 1
    $this->validate([
      'name' => 'required',
      'email' => 'required|email|unique:users',
      'password' => 'required',
    ]);
    User::create([
      'name' => $this->name,
      'email' => $this->email,
      'password' => $this->password,
    ]);

    // Opción 2
    /* $validatedDate = $this->validate([
      'name' => 'required',
      'email' => 'required|email|unique:users',
      'password' => 'required',
    ]);

    User::create($validatedDate);
    session()->flash('message', 'Usuario creado satisfactoriamente.');
    $this->resetInputFields();
    $this->emit('userStore'); */ // Close model to using to jquery
  }

  public function destroy($id)
  {
    User::destroy($id);
  }
}
