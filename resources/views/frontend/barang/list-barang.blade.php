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


            <hr>
            <div class="table-responsive invoice-table" id="table">
              <table class="table table-bordered table-striped">
                  <thead class="active">
                      <tr>
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
                      <tr>
                        <td>2/2/2021</td>
                        <td>abc</td>
                        <td>abc</td>
                        <td>abc</td>
                        <td>abc</td>
                        <td>abc</td>
                        <td>abc</td>
                        <td>abc</td>
                        <td>abc</td>
                        <td>abc</td>

                        <td>
                            {{-- <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#DetailModal">Detail</button> --}}
                            <button type="button" class="btn btn-info btn-sm" >Lihat/Print Barcode</button>
                            <button type="button" class="btn btn-warning btn-sm" >Edit</button>
                        </td>
                      </tr>


              </table>
            </div>

            </div>
        </div>
      </div>
    </div>
  </div>
@endsection
