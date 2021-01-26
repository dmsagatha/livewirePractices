<?php

namespace App\Http\Livewire;

use App\Models\Company;
use Livewire\Component;

class Companies extends Component
{
  public function render()
  {
    return view('companies.companies', [
      'companies' => Company::orderBy('id', 'desc')->get()
    ]);
  }
}
