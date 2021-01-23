<div>
  <a wire:click.prevent="create" href="#" class="btn btn-primary">Add new product</a>

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

  <div class="modal" @if ($showModal) style="display:block" @endif>
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form wire:submit.prevent="save">
          <div class="modal-header">
            <h5 class="modal-title">{{ $productId ? 'Edit Product' : 'Create New Product' }}</h5>
            <button wire:click="close" type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Name:
            <br/>
            <input wire:model="product.name" class="form-control"/>
            @error('product.name')
            <div style="font-size: 11px; color: red">{{ $message }}</div>
            @enderror
            <br/>
            Price:
            <br/>
            <input wire:model="product.price" class="form-control"/>
            @error('product.price')
            <div style="font-size: 11px; color: red">{{ $message }}</div>
            @enderror
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Save changes</button>
            <button wire:click="close" type="button" class="btn btn-secondary" data-dismiss="modal">Close
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>