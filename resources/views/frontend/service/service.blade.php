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
            <h5>Service</h5>
          </div>
          <div class="card-body">

            <!-- Tool -->
              <div class="dropdown-basic">
                <div class="row justify-content-end">
                  <div style="padding-right: 10px;">
                    <button class="btn btn-success btn-lg" type="button" data-toggle="modal" data-target="#addReward">Tambah</button>
                    {{-- Modal add --}}
                    <div class="modal fade" id="addReward" tabindex="-1" role="dialog" aria-labelledby="addReward" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h5 class="modal-title">Service</h5>
                                  <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                              </div>
                              <div class="modal-body">
                                  <form class="theme-form" action="" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group mb-3">
                                      <label class="col-form-label">Nama Barang</label>
                                      <select  class="js-example-basic-single form-control @error('barang') is-invalid @enderror" placeholder="Nama Barang" name="barang"
                                      value="{{ old('barang') }}" required autocomplete="barang"  autofocus>
                                        <option value="">tes</option>
                                        <option value="">tes2</option>
                                      </select>
                                      {{-- <input  id="barang" type="text"
                                                    class="form-control @error('barang') is-invalid @enderror" placeholder="Nama Barang" name="barang"
                                                    value="{{ old('barang') }}" required autocomplete="barang"  autofocus> --}}
                                      @error('barang')
                                        <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                        </span>
                                      @enderror
                                    </div>
                                    <div class="form-gorup mb-3">
                                      <select  class="js-example-basic-single form-control @error('barang') is-invalid @enderror" placeholder="Nama Barang" name="barang"
                                      value="{{ old('barang') }}" required autocomplete="barang"  autofocus>
                                        <option value="" disabled selected>Status</option>
                                        <option value="">Rusak</option>
                                        <option value="">Bagus</option>
                                      </select>
                                    </div>
                                      <div class="form-group row">
                                          <label class="col-sm-3 col-form-label">File</label>
                                          <div class="col-sm-9">
                                            <input class="form-control" type="file" id="thumbnail" name="image">
                                          </div>
                                      </div>


                                      <div class="modal-footer ">
                                        <button class="btn btn-primary">Add</button>
                                        <button class="btn btn-secondary" data-dismiss="modal" aria-label="Close">Cancel</button>
                                      </div>
                                  </form>
                              </div>
                          </div>
                      </div>
                  </div>
                  {{-- end modal add --}}
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
                          <th>Nama Teknisi</th>
                          <th>Kode</th>
                          <th>Tanggal Pengajuan</th>
                          <th>Tanggal Selesai</th>
                          <th>Sparepart</th>
                          <th>Waktu Pengerjaan</th>
                          <th>Status</th>
                          <th>action</th>
                      </tr>
                      </thead>
                  <tbody>
                      <tr>
                        <td>1</td>
                        <td>Abc</td>
                        <td>k</td>
                        <td>1222</td>
                        <td>2/2/2021</td>
                        <td>10/2/2021</td>
                        <td>Tes</td>
                        <td>5 Hari</td>
                        <td>Rusak</td>
                        <td>
                            {{-- <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#DetailModal">Detail</button> --}}

                            <button type="button" class="btn btn-success btn-sm" >Setuju</button>
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
