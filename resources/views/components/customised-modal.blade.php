{{-- <div class="fixed z-100 w-full h-full bg-gray-500 opacity-75 top-0 left-0"></div>

<div class="fixed z-101 w-full h-full top-0 left-0 overflow-y-auto">
  <div class="table w-full h-full py-6">
    <div class="table-cell text-center align-middle">
      <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-lg text-left overflow-hidden shadow-xl">
          {{ $content }}
        </div>
      </div>
    </div>
  </div>
</div> --}}
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{ $content }}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>