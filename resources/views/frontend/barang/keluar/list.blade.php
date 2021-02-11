@extends('frontend.layout-frontend.master')
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
                    <button class="btn btn-success btn-lg" type="button" data-toggle="modal" data-target="#addReward">Tambah</button>

                    {{-- <div class="dropdown">
                      <div class="btn-group mb-0">
                        <button class="dropbtn btn-info btn-round" type="button">Filter <span><i class="icofont icofont-arrow-down"></i></span></button>
                        <div class="dropdown-content"><a href="#">Selesai</a><a href="#">Belum selesai</a><a href="#">Pending</a>
                        </div>
                      </div>
                    </div> --}}
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
                          <th>Nama barang</th>
                          <th>Tanggal Mutasi</th>
                          <th>Kode Barcode</th>
                          <th>Kode Mutasi</th>
                          <th>Gudang Tujuan</th>
                          <th>Status</th>
                          <th>action</th>
                      </tr>
                      </thead>
                  <tbody>
                      <tr>
                        <td>1</td>
                        <td>Abc</td>
                        <td>2/2/2021</td>
                        <td>123</td>
                        <td>222</td>
                        <td>A</td>
                        <td>p</td>
                        <td>
                            {{-- <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#DetailModal">Detail</button> --}}
                            <button type="button" class="btn btn-info btn-sm" >Edit</button>
                            <button type="button" class="btn btn-danger btn-sm" >Batal</button>
                        </td>
                      </tr>

                  </tbody>
              </table>
            </div>

            </div>
        </div>
      </div>
    </div>
  </div>
@endsection
