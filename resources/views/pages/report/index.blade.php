@extends('template.main')

@section('title','Report')

@section('content')
  <div class="section-body">
    <h2 class="section-title">Report</h2>
    <p class="section-lead">This page is just an example for you to create your own page.</p>
    <div class="card shadow">
      <div class="card-header">
        <h4>Choose Report</h4>
      </div>
      <div class="card-body p-0">
        <div class="table-responsive table-invoice">
          <table class="table table-striped">
            <thead>
              <tr>
                <th><i class="fas fa-th"></i></th>
                <th>Report</th>
                <th>Info</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>

              <tr>
                <td>1</td>
                <td>Laporan Per-Ruang</td>
                <td>Menampilkan laporan item berdasarkan ruangan</td>
                <td>
                  <a href="{{ route('report.room') }}" target="blank" class="btn btn-primary">Show</a>
                </td>
              </tr>

              <tr>
                <td>2</td>
                <td>Laporan Per-Type</td>
                <td>Menampilkan laporan item berdasarkan type</td>
                <td>
                  <a href="{{ route('report.type') }}" target="blank" class="btn btn-primary">Show</a>
                </td>
              </tr>

              <tr>
                <td>3</td>
                <td>Laporan Per-Periode</td>
                <td>Menampilkan laporan peminjaman berdasarkan rentang tanggal tertentu</td>
                <td>
                  <a href="{{ route('report.period') }}" target="blank" class="btn btn-primary">Show</a>
                </td>
              </tr>

              <tr>
                <td>4</td>
                <td>Laporan Unreturned Item</td>
                <td>Menampilkan laporan peminjaman barang yang belum dikembalikan berdasarkan</td>
                <td>
                  <a href="{{ route('report.unreturned') }}" target="blank" class="btn btn-primary">Show</a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection