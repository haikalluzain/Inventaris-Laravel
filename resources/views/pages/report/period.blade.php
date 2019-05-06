@extends('template.main')

@section('title','Report By Period')

@section('content')
  <div class="section-body">
    <h2 class="section-title">Report by period</h2>
    <p class="section-lead">This page is just an example for you to create your own page.</p>
    
    <div class="card">
      <form action="{{ route('report.printperiod') }}" method="post">
        @csrf
        <div class="card-header">
          <h4>Report Form <a href="{{ route('report') }}" class="btn btn-info ml-2"><i class="fas fa-arrow-left"></i> back</a></h4>
        </div>
        <div class="card-body">
          <div class="form-row col-12">
            <div class="form-group mb-0 col-md-5 offset-1">
              <label for="start">Date Start</label>
              <input type="date" class="form-control datepicker {{ session('error') ? 'is-invalid': '' }}" name="start" id="start">
              @if(session('error'))
                <div class="invalid-feedback">
                  {{ session('error') }}
                </div>
              @endif
            </div>
            <div class="form-group mb-0 col-md-5">
              <label for="end">Date End</label>
              <input type="date" class="form-control datepicker" name="end" id="end">
            </div>
          </div>
        </div>
        <div class="card-footer text-center">
          <button class="btn btn-primary btn-lg"><i class="fas fa-print mr-1"></i> Print</button>
        </div>
      </form>
    </div>
  </div>
@endsection