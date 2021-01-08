<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class OrderController extends Controller
{
  public function create()
  {
    return view('orders.create');
  }

  public function store(Request $request)
  {
    $order = Order::create([
      'customer_name' => $request->customer_name,
      'customer_email' => $request->customer_email,
    ]);

    foreach ($request->orderProducts as $product) {
      $order->products()->attach(
        $product['product_id'],
        ['quantity' => $product['quantity']]
      );
    }

    //return 'Orden creada satisfactoriamente!';
    // return Redirect::back()->with('success', 'Pedido creado satisfactoriamente!');
    return back()->withSuccess('Orden creada satisfactoriamente!');
  }
}
