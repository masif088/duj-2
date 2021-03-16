@extends('frontend.layouts.master')
@section('content')
  <div class="page-header">
  </div>
  <div class="container-fluid">
    <div class="row starter-main">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <!-- <div class="pull-right mr-4"><a href="#">Edit Profile Playlist</a></div> -->
            <h5>Semua Barang</h5>
          </div>
          <div class="card-body">

            {{-- <hr> --}}
            <div class="table-responsive invoice-table" id="table">
              <table class="table table-bordered table-striped">
                  <thead class="active">
                      <tr>
                          <th>No</th>
                          <th>Tanggal</th>
                          <th>Nama Barang</th>
                          <th>Kode</th>
                          <th>Harga</th>
                      </tr>
                      </thead>
                  <tbody>
                    @foreach ($barang as $i=>$b)
                    <tr>
                      <td>{{$i+1}}</td>
                      <td>{{$b->created_at->format('d-M-Y, H:m')}}</td>
                      <td>{{$b->masuk->barang->name}}</td>
                      <td>{{$b->kode}}</td>
                      <td>
                        {{$b->masuk->harga_satuan}}
                      </td>
                    </tr>
                    @endforeach
                    


                  </tbody>
              </table>
            </div>
            <div class="row">
              <div class="col-md-12">
                  {{$barang->links()}}
              </div>
          </div>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection
