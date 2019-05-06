@extends('template.main')

@section('title','Item')

@section('content')
  <div class="section-body">
    <h2 class="section-title">Edit an Item</h2>
    <p class="section-lead">This page is just an example for you to create your own page.</p>
    
    <div class="card">
      <form action="{{ route('item.supply') }}" method="post">
        @csrf
        <div class="card-header">
          <h4>Item Form <a href="{{ route('item.index') }}" class="btn btn-info ml-2"><i class="fas fa-arrow-left"></i> Back</a></h4>
        </div>
        <div class="card-body">
          <div class="form-group row">
            <label class="col-12 col-md-3 col-form-label text-md-right">Item Name</label>
            <div class="col-sm-12 col-md-7">
              <input type="hidden" name="item_id" value="{{ $data->id }}">
              <input type="text" class="form-control" value="{{ $data->name }}" disabled>
              
            </div>
          </div>

          <div class="form-group row">
            <label class="col-12 col-md-3 col-form-label text-md-right">Total</label>
            <div class="col-sm-12 col-md-7">
              <input type="number" name="total" min="0" class="form-control">
              
            </div>
          </div>

        </div>
        <div class="card-footer text-right">
          <button class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
@endsection