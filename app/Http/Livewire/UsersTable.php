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

  // sortBy($field) and render()
  public $perPage = 10;
  public $sortField = 'name';
  public $sortAsc = true;
  public $search = '';

  // createUser()
  public $state = [];

  // show($userId)
  public $showModal = false;
  public $user;
  public $userId;

  public function sortBy($field)
  {
    /* Si el campos esta activo, reverse el ordenamiento,
    de lo contrario configure la dirección a 'true' */
    if ($this->sortField === $field) {
      $this->sortAsc = !$this->sortAsc;
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
      'name' => 'required',
      'email' => 'required|email|unique:users',
      'password' => 'required|confirmed',
    ])->validate();

    $validatedData['password'] = bcrypt($validatedData['password']);

    User::create($validatedData);

    // Alert
    // session()->flash('message', 'Usuario creado satisfactoriamente!');

    // Toastr - https://codeseven.github.io/toastr/
    // $this->dispatchBrowserEvent('hide-form');
    $this->dispatchBrowserEvent('hide-form', [
      'message' => 'Usuario creado satisfactoriamente!'
    ]);

    return redirect()->back();
  }

  public function show($userId)
  {
    $this->showModal = true;
    $this->userId = $userId;
    $this->user = User::find($userId);
  }

  public function close()
  {
    $this->showModal = false;
  }

  public function clearSearch()
  {
    $this->search = '';
    $this->perPage = '10';
  }
}
