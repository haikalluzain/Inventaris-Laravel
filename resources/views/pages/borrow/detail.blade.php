@extends('template.main')

@section('title','Borrow')

@section('content')
  <div class="section-body">
    <h2 class="section-title">Borrow Detail</h2>
    <p class="section-lead">This page is just an example for you to create your own page.</p>
    <div class="card shadow">
      <div class="card-header">
        <h4>Detail Borrow <a href="{{ route('borrow.index') }}" class="btn btn-info"><i class="fas fa-arrow-left"></i> Back</a></h4>
      </div>
      <div class="card-body p-0">
        <div class="table-responsive table-invoice">
          <table class="table table-striped">
            <thead>
              <tr>
                <th><i class="fas fa-th"></i></th>
                <th>Item</th>
                <th>Total</th>
                <th>Date Borrow</th>
                <th>Officer</th>
              </tr>
            </thead>
            <tbody>

              @if(count($data->borrowDetail) > 0)

                @foreach($data->borrowDetail as $field)

                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td class="font-weight-600">{{ $field->item->name }}</td>
                  <td>{{ $field->total }}</td>
                  <td>{{ $field->borrow->date_borrow }}</td>
                  <td>
                    @if($field->borrow->officer_id == null)
                      <div class="badge badge-warning">Unconfirmed</div>
                    @else
                      {{ $field->borrow->user->name }}
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