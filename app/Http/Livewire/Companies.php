<?php

namespace App\Http\Livewire;

use App\Models\Company;
use Livewire\Component;

class Companies extends Component
{
  public $title;
  public $company_id;

  // Ventana modal
  public $isOpen = 0;

  public function render()
  {
    return view('companies.companies', [
      'companies' => Company::orderBy('id', 'desc')->get()
    ]);
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
    $this->title = '';
    $this->company_id = '';
  }

  public function create()
  {
    $this->resetInputFields();
    $this->openModal();
  }

  public function store()
  {
    $this->validate([
      'title' => 'required|unique:companies,title,'.$this->company_id,
    ]);

    $data = array(
      'title' => $this->title
    );

    $company = Company::updateOrCreate(['id' => $this->company_id],$data);

    session()->flash('message', $this->company_id ? 'Companía actualizada satisfactoriamente!.' : 'Companía creada satisfactoriamente!.');

    $this->closeModal();
    $this->resetInputFields();
  }

  public function edit($id)
  {
    $company = Company::findOrFail($id);
    
    $this->company_id = $id;
    $this->title = $company->title;
    $this->openModal();
  }
}