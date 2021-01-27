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

  public $title;
  public $company_id;

  public $showModal = false;

  public function render()
  {
    return view('companies.companies', [
      'companies' => Company::search($this->search)
        ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
        ->paginate($this->perPage)
    ]);
  }

  public function create()
  {
    $this->resetInputFields();
    $this->openModal();
  }

  public function store()
  {
    $this->validate([
      'title' => 'required|unique:companies,title,' . $this->company_id,
    ]);

    $data = [
      'title' => $this->title
    ];

    $company = Company::updateOrCreate(['id' => $this->company_id], $data);

    session()->flash('message', $this->company_id ? 'Companía actualizada satisfactoriamente!😁' : 'Companía creada satisfactoriamente!😁');

    $this->showModal = false;
    $this->resetInputFields();
    $this->perPage = '10';
  }

  public function edit($id)
  {
    $company = Company::findOrFail($id);
    $this->company_id = $id;
    $this->title = $company->title;

    $this->openModal();
  }

  public function delete($id)
  {
    $this->company_id = $id;
    Company::find($id)->delete();

    session()->flash('message', 'Companía eliminada satisfactoriamente.');
  }

  private function resetInputFields()
  {
    $this->title = '';
    $this->company_id = '';
  }

  public function openModal()
  {
    $this->showModal = true;

    // Limpiar los errores si eran visibles antes
    $this->resetErrorBag();
    $this->resetValidation();
  }

  public function closeModal()
  {
    $this->showModal = false;
    $this->resetErrorBag();
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
