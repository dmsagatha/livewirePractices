<div>
  <form action="{{ route('orders.store') }}" method="POST">
    @csrf

    <div class="form-group {{ $errors->has('order_number') ? 'has-error' : '' }}">
      Número de Orden
      <input type="text" name="order_number" class="form-control"
      value="{{ old('order_number') }}">

      {!! $errors->first('order_number', '<small class="text-danger">:message</small>') !!}
    </div>
    <div class="form-group {{ $errors->has('customer_name') ? 'has-error' : '' }}">
      Nombre
      <input type="text" name="customer_name" class="form-control"
      value="{{ old('customer_name') }}">

      {!! $errors->first('customer_name', '<small class="text-danger">:message</small>') !!}
    </div>
    <div class="form-group {{ $errors->has('customer_email') ? 'has-error' : '' }}">
      Correo electrónico
      <input type="email" name="customer_email" class="form-control"
      value="{{ old('customer_email') }}">

      {!! $errors->first('customer_email', '<small class="text-danger">:message</small>') !!}
    </div>

    <div class="card">
      <div class="card-header">
        Productos
      </div>

      <div class="card-body">
        <table class="table" id="products_table">
          <thead>
            <tr class="text-center">
              <th>Producto</th>
              <th>Cantidad</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($orderProducts as $index => $orderProduct)
              <tr>
                <td>
                  <select name="orderProducts[{{ $index }}][product_id]"
                    wire:model="orderProducts.{{ $index }}.product_id"
                    class="form-control">
                    <option value="">-- Elegir producto --</option>
                    @foreach ($allProducts as $product)
                      <option value="{{ $product->id }}">
                        {{ $product->name }} (${{ number_format($product->price, 2) }})
                      </option>
                    @endforeach
                  </select>
                </td>
                <td>
                  <input type="number"
                    name="orderProducts[{{ $index }}][quantity]"
                    class="form-control"
                    wire:model="orderProducts.{{ $index }}.quantity"
                  >
                </td>
                <td>
                  <a href="#" class="btn btn-sm btn-danger"
                    wire:click.prevent="removeProduct({{ $index }})">
                    <i class="fas fa-minus"></i>  Fila</a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>

        <div class="row">
          <div class="col-md-12 text-center">
            <button class="btn btn-sm btn-success" wire:click.prevent="addProduct">
              <i class="fa fa-plus"> Otro producto</i>
            </button>
          </div>
        </div>
      </div>
    </div>
    <br />

    <div class="text-center mb-3">
      <input class="btn btn-primary" type="submit" value="Guardar Orden">
    </div>
  </form>
</div>