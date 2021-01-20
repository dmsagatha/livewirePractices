<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Validator;

class UsersTable extends Component
{
  use WithPagination;

  protected $paginationTheme = 'bootstrap';

  public $state = [];

  public $perPage = 10;
  public $sortField = 'name';
  public $sortAsc = true;
  public $search = '';

  public function sortBy($field)
  {
    /* Si el campos esta activo, reverse el ordenamiento,
    de lo contrario configure la dirección a 'true' */
    if ($this->sortField === $field) {
      $this->sortAsc = ! $this->sortAsc;
    } else {
      $this->sortAsc = true;
    }

    $this->sortField = $field;
  }

  public function render()
  {
    return view('users-table.users-table', [
      'users' => User::search($this->search)
        ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
        ->paginate($this->perPage),
    ]);
  }

  public function addNew()
  {
    $this->dispatchBrowserEvent('show-form');
  }

  public function createUser()
  {
    $validatedData = Validator::make($this->state, [
        'name'     => 'required',
        'email'    => 'required|email|unique:users',
        'password' => 'required|confirmed',
    ])->validate();

    $validatedData['password'] = bcrypt($validatedData['password']);

    User::create($validatedData);

    $this->dispatchBrowserEvent('hide-form');

    return redirect()->back();
  }
}