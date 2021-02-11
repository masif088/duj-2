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
                                      <label class="col-form-label">Nama Pembeli</label>

                                      <input  id="Pembeli" type="text"
                                                    class="form-control @error('pembeli') is-invalid @enderror" placeholder="Nama Pembeli" name="pembeli"
                                                    value="{{ old('pembeli') }}" required autocomplete="pembeli"  autofocus>
                                      @error('pembeli')
                                        <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                        </span>
                                      @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                      <label class="form-label">Alamat</label>
                                      <textarea rows="5"  id="alamat" type="text"
                                                    class="form-control @error('alamat') is-invalid @enderror" placeholder="Alamat" name="alamat"
                                                     required autocomplete="alamat"  autofocus></textarea>
                                      @error('alamat')
                                        <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                        </span>
                                      @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                      <label class="col-form-label">No HP</label>
                                      <input  id="no_hp" type="text"
                                                    class="form-control @error('no_hp') is-invalid @enderror" placeholder="No HP" name="no_hp"
                                                    value="" required autocomplete="no_hp"  autofocus>
                                      @error('no_hp')
                                        <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                        </span>
                                      @enderror
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
                          <th>Nama Pembeli</th>
                          <th>Nama produk</th>
                          <th>Nama Teknisi</th>
                          <th>Alamat</th>
                          <th>No Hp</th>
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
                        <td>tes</td>
                        <td>Banyuwangi</td>
                        <td>01231345</td>
                        <td>2/2/2021</td>
                        <td>10/2/2021</td>
                        <td>Tes</td>
                        <td>8 Hari</td>
                        <td>Rusak</td>
                        <td>
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
