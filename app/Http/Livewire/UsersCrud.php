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
  public $user_id;
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

    $this->resetInputFields();

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

  public function edit($id)
  {
    // Opción 1
    $user = User::find($id);

    $this->user_id = $user->id;
    $this->name = $user->name;
    $this->email = $user->email;
    $this->password = $user->password;

    $this->view = 'edit';

    // Opción 2
    /* $this->updateMode = true;
    $user = User::where('id', $id)->first();
    $this->user_id = $id;
    $this->name = $user->name;
    $this->email = $user->email; */
  }

  public function update()
  {
    // Opción 1

    $this->validate([
      'name' => 'required',
      'email' => 'required|email',
    ]);

    $user = User::find($this->user_id);

    $user->update([
      'name' => $this->name,
      'email' => $this->email,
      'password' => $this->password,
    ]);

    $this->default();

    // Opción 2
    /* $validatedDate = $this->validate([
      'name' => 'required',
      'email' => 'required|email',
    ]);
    if ($this->user_id) {
      $user = User::find($this->user_id);
      $user->update([
        'name' => $this->name,
        'email' => $this->email,
      ]);
      $this->updateMode = false;
      session()->flash('message', 'Users Updated Successfully.');
      $this->resetInputFields();
    } */
  }

  public function default()
  {
    $this->resetInputFields();
    $this->view = 'create';
  }

  private function resetInputFields()
  {
    $this->name = '';
    $this->email = '';
    $this->password = '';
  }

  public function destroy($id)
  {
    User::destroy($id);
  }
}
