@extends('template.main')

@section('title','Borrow')

@section('content')
  <div class="section-body">
    <h2 class="section-title">Borrows</h2>
    <p class="section-lead">This page is just an example for you to create your own page.</p>
    <div class="card shadow">
      <div class="card-header">
        <h4>Data Table</h4>
        <div class="card-header-action">
          <a href="{{ route('borrow.create') }}" class="btn btn-danger">Add More <i class="fas fa-plus"></i></a>
        </div>
      </div>
      <div class="card-body p-0">
        <div class="table-responsive table-invoice">
          <table class="table table-striped">
            <thead>
              <tr>
                <th><i class="fas fa-th"></i></th>
                <th>Employee</th>
                <th>Total Item</th>
                <th>Date Borrow</th>
                <th>Date Return</th>
                <th>status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>

              @if(count($data) > 0)

                @foreach($data as $field)

                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td class="font-weight-600">{{ $field->employee->name }}</td>
                  <td>{{ count($field->borrowDetail) }}</td>
                  <td>{{ $field->date_borrow }}</td>
                  <td>{{ $field->date_return }}</td>
                  <td>
                    @switch($field->status)
                      @case('uncompleted')
                      @case('denied')
                      @case('canceled')
                        <div class="badge badge-danger">{{ $field->status }}</div>
                      @break
                      @case('booking')
                      @case('returned')
                        <div class="badge badge-warning">{{ $field->status }}</div>
                      @break
                      @case('borrowed')
                        <div class="badge badge-primary">{{ $field->status }}</div>
                      @break
                    @endswitch
                  </td>
                  <td nowrap="">
                    @if(Auth::guard('web')->check())
                      @switch($field->status)
                        @case('uncompleted')
                          <a href="{{ route('borrow.show', $field) }}" class="btn btn-primary">Show Form</a>
                        @break
                        @case('booking')
                          <a href="{{ route('borrow.confirm', $field) }}" class="btn btn-success confirm-btn" title="Confirm?" content="Peminjaman yang sudah dikonfirmasi tidak dapat dikembalikan">Confirm</a>
                          <a href="{{ route('borrow.denied', $field) }}" class="btn btn-danger confirm-btn" title="Denied?" content="Peminjaman yang sudah ditolak tidak dapat dikembalikan">Denied</a>
                        @break
                        @case('borrowed')
                          <a href="{{ route('borrow_detail.show', $field) }}" class="btn btn-warning">Return</a>
                        @break
                      @endswitch
                    @elseif(Auth::guard('employee')->check())
                      @switch($field->status)
                        @case('uncompleted')
                          <a href="{{ route('borrow.show', $field) }}" class="btn btn-primary">Show Form</a>
                        @break
                        @case('borrowed')
                          <a href="{{ route('borrow_detail.show', $field) }}" class="btn btn-warning">Return</a>
                        @break
                        @case('booking')
                          <a href="{{ route('borrow.cancel', $field) }}" class="btn btn-danger confirm-btn" title="Cancel?" content="Peminjaman yang sudah dibatalkan tidak dapat dikembalikan">Cancel</a>
                        @break
                      @endswitch
                    @endif
                    
                    <a href="{{ route('borrow.detail', $field) }}" class="btn btn-info">Detail</a>
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