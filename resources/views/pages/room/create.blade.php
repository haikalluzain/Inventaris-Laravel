@extends('template.main')

@section('title','Room')

@section('content')
  <div class="section-body">
    <h2 class="section-title">Create a Room</h2>
    <p class="section-lead">This page is just an example for you to create your own page.</p>
    
    <div class="card">
      <form class="needs-validation" novalidate="" action="{{ route('room.store') }}" method="post">
        @csrf
        <div class="card-header">
          <h4>Room Form <a href="{{ route('room.index') }}" class="btn btn-info ml-2"><i class="fas fa-arrow-left"></i> Kembali</a></h4>
        </div>
        <div class="card-body">
          <div class="form-group row">
            <label class="col-12 col-md-3 col-form-label text-md-right">Room Name</label>
            <div class="col-sm-12 col-md-7">
              <input type="text" class="form-control" name="name" required="">
              <div class="invalid-feedback">
                  Silahkan isi nama rungan
              </div>
            </div>
          </div>
          <div class="form-group mb-0 row">
            <label class="col-12 col-md-3 col-form-label text-md-right">Info</label>
            <div class="col-sm-12 col-md-7">
              <textarea class="form-control" name="info" required=""></textarea>
              <div class="invalid-feedback">
                Silahkan berikan keterangan tentang ruangan tersebut
              </div>
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