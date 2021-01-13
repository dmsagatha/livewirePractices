<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Users extends Component
{
  public function render()
  {
    $this->users = User::all();
    return view('livewire.users.index');
  }
}
