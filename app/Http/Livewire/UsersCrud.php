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
      'users' => User::orderBy('id', 'desc')->paginate(10)
    ]);
  }

  public function store()
  {
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
  }

  public function edit($id)
  {
    $user = User::find($id);

    $this->user_id = $user->id;
    $this->name = $user->name;
    $this->email = $user->email;
    $this->password = $user->password;

    $this->view = 'edit';
  }

  public function update()
  {
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
