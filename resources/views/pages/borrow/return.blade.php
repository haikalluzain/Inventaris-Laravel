@extends('template.main')

@section('title','Return Borrow')

@section('content')
  <div class="section-body">
    <h2 class="section-title">Return Borrow</h2>
    <p class="section-lead">This page is just an example for you to create your own page.</p>
    

    <div class="card shadow">
      <div class="card-header">
        <h4>Return Table <a href="{{ route('borrow.index') }}" class="btn btn-info"><i class="fas fa-arrow-left"></i> Back</a></i></h4>
      </div>
      <div class="card-body p-0">
        <form action="{{ route('borrow_detail.update',$data) }}" method="post">
          @csrf @method('patch')
          <div class="table-responsive table-invoice">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th><i class="fas fa-th"></i></th>
                  <th>Item</th>
                  <th>Total</th>
                  <th>Broken</th>
                </tr>
              </thead>
              <tbody>

                @if(count($data->borrowDetail) > 0)

                  @foreach($data->borrowDetail as $field)

                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td class="font-weight-600">{{ $field->item->name }}</td>
                    <td>{{ $field->total }}</td>
                    <td>
                      <input type="number" class="form-control" name="total_broken[]" max="{{ $field->total }}" min="0" value="0">
                      <input type="hidden" name="item_id[]" value="{{ $field->item_id }}">
                      <input type="hidden" name="total[]" value="{{ $field->total }}">
                    </td>
                  </tr>

                  @endforeach

                @else

                  <tr class="text-center">
                    <td colspan="4">No data found</td>
                  </tr>

                @endif


              </tbody>
            </table>
          </div>

          @if(count($data->borrowDetail) > 0)
            <div class="card-footer">
              <button class="btn btn-primary btn-block">Return</button>
            </div>
          @endif
        </form>
      </div>
    </div>
  </div>
@endsection