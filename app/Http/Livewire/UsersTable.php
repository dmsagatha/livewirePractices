<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersTable extends Component
{
  use WithPagination;

  protected $paginationTheme = 'bootstrap';

  public $perPage = 10;
  public $sortField = 'name';
  public $sortAsc = true;

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
      'users' => User::query()
        ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
        ->paginate($this->perPage),
    ]);
  }
}