<div>
  <form action="{{ route('orders.store') }}" method="POST">
    @csrf
    <div class="form-group {{ $errors->has('customer_name') ? 'has-error' : '' }}">
      Nombre
      <input type="text" name="customer_name" class="form-control"
      value="{{ old('customer_name') }}" required>
      @if($errors->has('customer_name'))
        <em class="invalid-feedback">
          {{ $errors->first('customer_name') }}
        </em>
      @endif
    </div>
    <div class="form-group {{ $errors->has('customer_email') ? 'has-error' : '' }}">
      Correo electrónico
      <input type="email" name="customer_email" class="form-control"
      value="{{ old('customer_email') }}">
      @if($errors->has('customer_email'))
        <em class="invalid-feedback">
          {{ $errors->first('customer_email') }}
        </em>
      @endif
    </div>

    <div class="card">
      <div class="card-header">
        Productos
      </div>

      <div class="card-body">
        <table class="table" id="products_table">
          <thead>
            <tr>
              <th>Producto</th>
              <th>Cantidad</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($orderProducts as $index => $orderProduct)
              <tr>
                <td>
                  <select name="orderProducts[{{ $index }}][product_id]" class="form-control">
                    <option value="">-- Elegir producto --</option>
                    @foreach ($allProducts as $product)
                      <option value="{{ $product->id }}">
                        {{ $product->name }} (${{ number_format($product->price, 2) }})
                      </option>
                    @endforeach
                  </select>
                </td>
                <td>
                  <input type="number" name="orderProducts[{{ $index }}][quantity]"
                    class="form-control" value="{{ $orderProduct['quantity'] }}"
                  >
                </td>
                <td>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>

        <div class="row">
          <div class="col-md-12">
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