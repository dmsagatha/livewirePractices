<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\WithPagination;
use Livewire\Component;

class ProductsModal extends Component
{
  use WithPagination;

  protected $paginationTheme = 'bootstrap';

  public function render()
  {
    return view('products-modal.products-modal', [
      'products' => Product::latest()->paginate(5)
    ]);
  }
}
