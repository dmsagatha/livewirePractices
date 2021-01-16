<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersModal extends Component
{
  use WithPagination;

  protected $paginationTheme = 'bootstrap';

  public $name;
  public $email;
  public $password;
  public $ids;

  public function render()
  {
    return view('users-modal.users-modal', [
      'users' => User::orderBy('name')->paginate(),
    ]);
  }

  private function resetInputFields()
  {
    $this->name     = '';
    $this->email    = '';
    $this->password = '';
  }

  public function store()
  {
    $validatedDate = $this->validate([
      'name'     => 'required',
      'email'    => 'required|email|unique:users',
      'password' => 'required',
    ]);

    User::create($validatedDate);

    session()->flash('message', 'Usuario creado satisfactoriamente.');

    $this->resetInputFields();

    $this->emit('userStore'); // Cerrar el modal usando jquery (app)
  }
}
