<div>
  <h3 class="card-title mb-3">
    Listado de Posts

    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#modalForm">
      <i class="fa fa-plus-circle mr-1"></i>{{ __('Add new') }} Post
    </button>
  </h3>

  @if ($posts->count())
    <table class="table table-striped">
      <thead>
        <th>{{ __('Title') }}</th>
        <th>{{ __('Description') }}</th>
        <th width="30%">{{ __('Actions') }}</th>
      </thead>
      <tbody>
        @foreach ($posts as $item)
          <tr>
            <td>{{ $item->title }}</td>
            <td>{{ $item->content }}</td>
            <td>
              <button wire:click="selectItem({{ $item->id }}, 'update')" class="btn btn-sm btn-success">Update</button>
              <button wire:click="selectItem({{ $item->id }}, 'delete')" class="btn btn-sm btn-danger">Delete</button>
              <button wire:click="selectItem({{ $item->id }}, 'showPhotos')" class="btn btn-sm btn-primary">Photos</button>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>

    {{ $posts->links()}}
  @endif
    
  <!-- Modal -->
  <div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Save Post</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Formulario
        </div>            
      </div>
    </div>
  </div>
</div>