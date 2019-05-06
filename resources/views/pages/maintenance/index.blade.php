@extends('template.main')

@section('title','Maintenance')

@section('content')
  <div class="section-body">
    <h2 class="section-title">Maintenances</h2>
    <p class="section-lead">This page is just an example for you to create your own page.</p>
    <div class="card shadow">
      <div class="card-header">
        <h4>Data Table</h4>
      </div>
      <div class="card-body p-0">
        <div class="table-responsive table-invoice">
          <table class="table table-striped">
            <thead>
              <tr>
                <th><i class="fas fa-th"></i></th>
                <th>Item</th>
                <th>Total</th>
                <th>Date Broken</th>
                <th>Date Fixed</th>
                <th>Borrower</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>

              @if(count($data) > 0)

                @foreach($data as $field)

                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td class="font-weight-600">{{ $field->item->name }}</td>
                  <td>{{ $field->total }}</td>
                  <td>{{ $field->broken_at }}</td>
                  <td>
                    @if($field->fixed_at == null)
                      <div class="badge badge-danger">Not Fixed Yet</div>
                    @else
                      {{ $field->fixed_at }}
                    @endif
                  </td>
                  <td>{{ $field->borrow->employee->name }}</td>
                  <td>
                    @if($field->fixed_at == null)
                      <a href="{{ route('maintenance.destroy', $field->id) }}" class="btn btn-primary fix-btn"><i class="fas fa-wrench mr-1"></i> Fix now</a>
                    @else
                      <div class="badge badge-success">Fixed</div>
                    @endif
                  </td>
                </tr>

                @endforeach

              @else

                <tr class="text-center">
                  <td colspan="7">No data found</td>
                </tr>

              @endif


            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection