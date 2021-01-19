<?php

namespace App\Http\Livewire;

use App\Models\Company;
use Livewire\Component;
use Livewire\WithPagination;

class CompaniesModal extends Component
{
  use WithPagination;

  protected $paginationTheme = 'bootstrap';

  public $title;
  public $company_id;
  public $isOpen = 0;

  public function render()
  {
    return view('companies-modal.companies-modal', [
      'companies' => Company::orderBy('id', 'desc')->paginate(),
    ]);
  }
  
  public function create()
  {
    $this->resetInputFields();
    $this->openModal();
  }

  public function openModal()
  {
    $this->isOpen = true;
  }

  public function closeModal()
  {
    $this->isOpen = false;
  }

  private function resetInputFields()
  {
    $this->title      = '';
    $this->company_id = '';
  }

  public function store()
  {
    $this->validate([
      'title' => 'required|unique:companies,title,' . $this->company_id,
    ]);
    $data = [
      'title' => $this->title,
    ];
    $company = Company::updateOrCreate(['id' => $this->company_id], $data);
    session()->flash('message', $this->company_id ? 'Empresa actualizada satisfactoriamente.' : 'Empresa creada satisfactoriamente.');
    $this->closeModal();
    $this->resetInputFields();
  }

  public function edit($id)
  {
    $company          = Company::findOrFail($id);
    $this->company_id = $id;
    $this->title      = $company->title;
    $this->openModal();
  }

  public function delete($id)
  {
    $this->company_id = $id;
    Company::find($id)->delete();
    session()->flash('message', 'Empresa eliminada satisfactoriamente.');
  }
}
