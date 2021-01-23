<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\WithPagination;
use Livewire\Component;

class ProductsModal extends Component
{
  use WithPagination;

  protected $paginationTheme = 'bootstrap';

  public $showModal = false;
  public $productId;
  public $product;

  protected $rules = [
    'product.name' => 'required',
    'product.price' => 'required|numeric', 10
  ];

  public function render()
  {
    return view('products-modal.products-modal', [
      'products' => Product::latest()->paginate(10)
    ]);
  }

  public function edit($productId)
  {
    $this->showModal = true;
    $this->productId = $productId;
    $this->product = Product::find($productId);
  }

  public function create()
  {
    $this->showModal = true;
    $this->product = null;
    $this->productId = null;
  }

  public function save()
  {
    $this->validate();

    if (!is_null($this->productId)) {
      $this->product->save();
    } else {
      Product::create($this->product);
    }
    $this->showModal = false;
  }

  public function close()
  {
    $this->showModal = false;
  }
}
