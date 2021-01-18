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
  public $field;

  public function sortBy($field)
  {
    $this->sortField = $field;
  }

  public function render()
  {
    return view('users-table.users-table', [
      'users' => User::orderBy($this->sortField)
      ->paginate($this->perPage),
    ]);
  }
}