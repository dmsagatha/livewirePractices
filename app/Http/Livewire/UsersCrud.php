<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersCrud extends Component
{
  use WithPagination;

  protected $paginationTheme = 'bootstrap';

  public function render()
  {
    return view('livewire.users-crud', [
      'users' => User::orderBy('name')->paginate(10)
    ]);
  }

  public function destroy($id)
  {
    User::destroy($id);
  }
}
