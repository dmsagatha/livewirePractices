<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\OrderStoreRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class OrderController extends Controller
{
  public function create()
  {
    return view('orders.create');
  }

  public function store(OrderStoreRequest $request)
  {
    /* $order = Order::create([
      'customer_name' => $request->customer_name,
      'customer_email' => $request->customer_email,
    ]); */

    $order = Order::create($request->validated());

    // Valores inicializados en el Componente Livewire Products
    foreach ($request->orderProducts as $product) {
      $order->products()->attach(
        $product['product_id'],
        ['quantity' => $product['quantity']]
      );
    }

    //return 'Orden creada satisfactoriamente!';
    return Redirect::back()->with('success', 'Pedido creado satisfactoriamente!');
    // return back()->withSuccess('Orden creada satisfactoriamente!');
  }
}
