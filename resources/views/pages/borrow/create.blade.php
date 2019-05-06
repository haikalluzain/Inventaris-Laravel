@extends('template.main')

@section('title','Borrow')

@section('content')
  <div class="section-body">
    <h2 class="section-title">Create a Borrow</h2>
    <p class="section-lead">This page is just an example for you to create your own page.</p>
    
    <div class="card">
      <form class="needs-validation" novalidate="" action="{{ route('borrow.store') }}" method="post">
        @csrf
        <div class="card-header">
          <h4>Borrow Form <a href="{{ route('borrow.index') }}" class="btn btn-info ml-2"><i class="fas fa-arrow-left"></i> back</a></h4>
        </div>
        <div class="card-body">
          @if(Auth::guard('web')->check())
            <div class="form-group row">
              <label class="col-12 col-md-3 col-form-label text-md-right">Select Employee</label>
              <div class="col-sm-12 col-md-7">
                <select name="employee_id" class="form-control">
                  @foreach($emps as $emp)
                    <option value="{{ $emp->id }}">{{ $emp->name }}</option>
                  @endforeach
                </select>
                
              </div>
            </div>
          @elseif(Auth::guard('employee')->check())
            <div class="form-group row">
              <label class="col-12 col-md-3 col-form-label text-md-right">Employee</label>
              <div class="col-sm-12 col-md-7">
                <input type="text" class="form-control" disabled="" value="{{ Auth::guard('employee')->user()->name }}">
                <input type="hidden" name="employee_id" value="{{ Auth::guard('employee')->user()->id }}">
                
              </div>
            </div>
          @endif
          
          <div class="form-group row">
            <label class="col-12 col-md-3 col-form-label text-md-right">Day Borrow</label>
            <div class="col-sm-12 col-md-7">
              <select name="dayCount" class="form-control">
                <option value="1">1 Day</option>
                <option value="3">3 Days</option>
                <option value="7">7 Days</option>
                <option value="14">14 Days</option>
                <option value="30">30 Days</option>
              </select>
              
            </div>
          </div>

          <div class="form-group row">
            <label class="col-12 col-md-3 col-form-label text-md-right">Date</label>
            <div class="col-sm-12 col-md-7">
              <input type="text" class="form-control" value="{{ date('d F Y') }}" disabled="">
            </div>
          </div>

          @if(Auth::guard('web')->check())
            <div class="form-group row">
            <label class="col-12 col-md-3 col-form-label text-md-right">Officer</label>
            <div class="col-sm-12 col-md-7">
              <input type="text" class="form-control" value="{{ Auth::user()->name }}" disabled="">
            </div>
          </div>
          @endif
        </div>
        <div class="card-footer text-right">
          <button class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
@endsection