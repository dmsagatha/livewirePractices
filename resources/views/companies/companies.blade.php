<div>
  <h3 class="card-title mb-3">
    Listado de Compañías

    <button class="btn btn-primary float-right">
      <i class="fa fa-plus-circle mr-1"></i>{{ __('Add new company') }}
    </button>
  </h3>

  @if (! $companies->isEmpty())
    <div class="table-responsive-sm">
      <table class="table table-hover">
        <thead>
          <tr class="text-center">
            <th>ID</th>
            <th>{{ __('Title') }}</th>
            <th>{{ __('Actions') }}</th>
          </tr>
        </thead>
        <tbody>
          @foreach($companies as $company)
            <tr>
              <td class="text-center">{{ $company->id }}</td>
              <td>{{ Str::limit($company->title, 25) }}</td>
              <td class="text-center" style="display-inline">
                <a href="">
                  <i class="fa fa-edit mr-2"></i>
                </a>
                <a href="">
                  <i class="fa fa-trash text-danger"></i>
                </a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  @else
    <h5>No hay registros creados</h5>
  @endif
</div>