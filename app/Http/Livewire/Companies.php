<?php

namespace App\Http\Livewire;

use App\Models\Company;
use Livewire\WithPagination;
use Livewire\Component;

class Companies extends Component
{
  use WithPagination;

  protected $paginationTheme = 'bootstrap';

  // sortBy($field) and render()
  public $perPage = 10;
  public $sortField = 'title';
  public $sortAsc = true;
  public $search = '';

  public function render()
  {
    return view('companies.companies', [
      'companies' => Company::search($this->search)
        ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
        ->paginate($this->perPage)
    ]);
  }

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

  public function clearSearch()
  {
    $this->search = '';
    $this->perPage = '10';
  }
}
