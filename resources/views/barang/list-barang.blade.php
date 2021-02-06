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
            <h5>Barang</h5>
          </div>
          <div class="card-body">

            <!-- Tool -->
              <div class="dropdown-basic">
                <div class="row justify-content-end">
                  <div style="padding-right: 10px;">
                    <a href="{{route('masuk.create')}}" ><button class="btn btn-success btn-lg" type="button">Add</button></a>

                </div>
              </div>

            </div>
            <!-- End Tool -->
            <hr>
            <div class="table-responsive invoice-table" id="table">
              <table class="table table-bordered table-striped">
                  <thead class="active">
                      <tr>
                        <th>No</th>
                          <th>Tanggal Masuk</th>
                          <th>Nama</th>
                          <th>Harga Satuan</th>
                          <th>Suplier</th>
                          <th>Gudang</th>
                          <th>Nama OP</th>
                          <th>Kode Akuntan</th>
                          <th>Kuantiti</th>
                          <th>Jumlah Aktif </th>
                          <th>Jumlah Mutasi</th>
                          <th>action</th>

                      </tr>
                      </thead>
                  <tbody>
                    @foreach ($masuk as $i=>$m)
                    <tr>
                      <td>{{$i+1}}</td>
                        <td>{{$m->created_at}}</td>
                        <td>{{$m->barang->name}}</td>
                        <td>{{$m->harga_satuan}}</td>
                        <td>{{$m->suplier->name}}</td>
                        <td>{{$m->gudang->name}}</td>
                        <td>{{$m->user->name}}</td>
                        <td>{{$m->kode_akuntan}}</td>
                        <td>{{$m->kuantiti}}</td>
                        <td>{{$m->barcode()->where('status','aktif')->count()}}</td>
                        <td>{{$m->barcode()->where('status','mutasi')->count()}}</td>
                        <td><a class="btn btn-success" href="{{route('barcode.index',$m->id)}}">Lihat/print Barcode</a>
                          <a class="btn btn-warning" href="{{route('masuk.edit',$m->id)}}">Edit</a></td>
                    </tr>
                    @endforeach


              </table>
            </div>

            </div>
        </div>
      </div>
    </div>
  </div>
@endsection
