<div>
  <table class="table mt-4">
    <thead>
      <tr>
        <th>Name</th>
        <th>Price</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @forelse ($products as $product)
        <tr>
          <td>{{ $product->name }}</td>
          <td>{{ $product->price }}</td>
          <td>
            <a wire:click.prevent="edit({{ $product->id }})"
            href="#" class="btn btn-sm btn-primary">Edit</a>
            <button wire:click.prevent="delete({{ $product->id }})"
              onclick="confirm('Are you sure?') || event.stopImmediatePropagation()"
              class="btn btn-sm btn-danger">Delete</button>
          </td>
        </tr>
      @empty
        <tr>
          <td colspan="3">No products found.</td>
        </tr>
      @endforelse
    </tbody>
  </table>

  {{ $products->links() }}
</div>