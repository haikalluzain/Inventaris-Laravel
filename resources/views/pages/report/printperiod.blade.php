@extends('template.blank')

@section('title','Report By Type')

@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="invoice-title mb-4">
      <h1 class="mb-1">Report</h1>
      <div class="invoice-number h5">Items in date <strong>{{ $start }}</strong> to <strong>{{ $end }}</strong></div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <address class="h6">
          <strong>Officer:</strong><br>
            {{ Auth::user()->name }}
        </address>
      </div>
      <div class="col-md-6 text-md-right">
        <address class="h6">
          <strong>Print Date:</strong><br>
          {{ date('d F Y') }}
        </address>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <address class="h6">
          <strong>Total Item:</strong><br>
          {{ count($data) }}
        </address>
      </div>
    </div>
  </div>
</div>

<div class="mt-4">
	<table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col"><i class="fas fa-th"></i></th>
          <th scope="col">Item</th>
          <th scope="col">Total</th>
          <th scope="col">Employee</th>
          <th scope="col">Date Borrow</th>
        </tr>
      </thead>
      <tbody>
        @foreach($data as $field)
			    <tr>
	          <th scope="row">{{ $loop->iteration }}</th>
	          <td nowrap="">{{ $field->item->name }}</td>
            <td>{{ $field->total }}</td>
            <td>{{ $field->borrow->employee->name }}</td>
            <td nowrap="">{{ $field->borrow->date_borrow }}</td>
	        </tr>
        @endforeach
      </tbody>
    </table>
</div>
@endsection

<script>
	window.print()
</script>