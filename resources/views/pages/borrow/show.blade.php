@extends('template.main')

@section('title','Borrow')

@section('content')
  <div class="section-body">
    <h2 class="section-title">Create a Borrow</h2>
    <p class="section-lead">This page is just an example for you to create your own page.</p>
    
    <div class="row">
      <div class="col-md-6">
        <div class="card shadow">
          <form action="{{ route('borrow_detail.store') }}" method="post">
            @csrf
            <div class="card-header">
              <h4>Borrow Form </h4>
            </div>
            <div class="card-body">
              <div class="form-group row">
                <label class="col-12 col-md-3 col-form-label text-md-right">Employee</label>
                <div class="col-sm-12 col-md-7">
                  <input type="text" class="form-control" value="{{ $data->employee->name }}" disabled>
                  <input type="hidden" name="borrow_id" value="{{ $data->id }}">
                  
                </div>
              </div>

              <div class="form-group row">
                <label class="col-12 col-md-3 col-form-label text-md-right">Item</label>
                <div class="col-sm-12 col-md-7">
                  <select name="item_id" class="form-control">
                    @foreach($items as $item)
                      <option value="{{ $item->id }}">{{ $item->name }} - total {{ $item->qty }}</option>
                    @endforeach
                  </select>
                  
                </div>
              </div>
              
              <div class="form-group row">
                <label class="col-12 col-md-3 col-form-label text-md-right">Total Borrow</label>
                <div class="col-sm-12 col-md-7">
                  <input type="number" min="0" class="form-control" name="total" required="">
                  
                </div>
              </div>

              <div class="form-group row mb-0">
                <label class="col-12 col-md-3 col-form-label text-md-right">Info</label>
                <div class="col-sm-12 col-md-7">
                  <textarea name="info" class="form-control"></textarea>
                  <span class="text-small">
                    *Berikan keterangan untuk penggunan barang
                  </span>
                  
                </div>
              </div>

            </div>
            <div class="card-footer text-center">
              <button class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
      </div>

      <div class="col-md-6">
        <div class="card shadow">
          <div class="card-header">
            <h4>Cart <i class="fas fa-shop-cart"></i></h4>
          </div>
          <div class="card-body p-0">
            <form action="{{ route('borrow.update',$data) }}" method="post">
              @csrf @method('patch')
              <div class="table-responsive table-invoice">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th><i class="fas fa-th"></i></th>
                      <th>Item</th>
                      <th>Total</th>
                      <th>Action</th>
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
                          <a href="{{ route('borrow_detail.destroy', $field) }}" class="btn btn-icon btn-danger delete-btn"><i class="far fa-trash-alt"></i></a>
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
                  <button class="btn btn-success btn-block">Done</button>
                </div>
              @endif
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection