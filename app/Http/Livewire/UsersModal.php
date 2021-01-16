<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersModal extends Component
{
  use WithPagination;

  protected $paginationTheme = 'bootstrap';

  public $ids;
  public $name;
  public $email;
  public $password;

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

    session()->flash('message', 'Usuario creado satisfactoriamente!');

    $this->resetInputFields();

    $this->emit('userStore'); // Cerrar el modal usando jquery (app)
  }

  public function edit($id)
  {
    $user           = User::where('id', $id)->first();
    $this->ids      = $user->id;
    $this->name     = $user->name;
    $this->email    = $user->email;
    $this->password = $user->password;
  }

  public function update()
  {
    $this->validate([
      'name'  => 'required',
      'email' => 'required|email',
    ]);

    if ($this->ids) {
      $user = User::find($this->ids);
      $user->update([
        'name'     => $this->name,
        'email'    => $this->email,
        'password' => $this->password,
      ]);

      session()->flash('message', 'Usuario actualizado satisfactoriamente!');

      $this->resetInputFields();

      $this->emit('userUpdated'); // Cerrar el modal usando jquery (app)
    }
  }

  public function cancel()
  {
    $this->updateMode = false;
    $this->resetInputFields();
  }

  public function delete($id)
  {
    if ($id) {
      User::where('id', $id)->delete();
      session()->flash('message', 'Usuario eliminado satisfactoriamente!');
    }
  }
}
