@extends('template.main')

@section('title','Report By Room')

@section('content')
  <div class="section-body">
    <h2 class="section-title">Report by room</h2>
    <p class="section-lead">This page is just an example for you to create your own page.</p>
    
    <div class="card">
      <form action="{{ route('report.printroom') }}" method="post">
        @csrf
        <div class="card-header">
          <h4>Report Form <a href="{{ route('report') }}" class="btn btn-info ml-2"><i class="fas fa-arrow-left"></i> back</a></h4>
        </div>
        <div class="card-body">
          <div class="form-group row mb-0">
            <label class="col-12 col-md-3 col-form-label text-md-right">Choose Room</label>
            <div class="col-sm-12 col-md-7">
              <select name="room_id" class="form-control">
                @foreach($rooms as $room)
                  <option value="{{ $room->id }}">{{ $room->name }}</option>
                @endforeach
              </select>
              
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