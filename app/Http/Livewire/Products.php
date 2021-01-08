<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class Products extends Component
{
  public $orderProducts = [];
  public $allProducts = [];

  public function mount()
  {
    $this->allProducts = Product::all();

    $this->orderProducts = [
      ['product_id' => '', 'quantity' => 1]
    ];
  }

  public function render()
  {
    return view('livewire.products');
  }
}
