@extends('template.main')

@section('title','Dashboard')

@section('content')
  <div class="section-body">
    <h2 class="section-title">Dashboard</h2>
    <p class="section-lead">This page is just an example for you to create your own page.</p>
    
    <div class="row">
    	<div class="col-md-6">
    		<div class="card shadow">
    			<div class="card-body">
    				<img src="{{ asset('asset/pic.jpg') }}" class="w-100 rounded" alt="">
    			</div>
    		</div>
    	</div>

    	<div class="col-md-6">
    		<div class="card shadow">
    			<div class="card-body">
    				<video src="{{ asset('asset/video.mp4') }}" class="w-100 rounded" controls autoplay loop></video>
    			</div>
    		</div>
    	</div>
    </div>
  </div>
@endsection