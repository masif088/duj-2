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
                            <button type="button" class="btn btn-info btn-sm" >Edit</button>
                            <button type="button" class="btn btn-danger btn-sm" >Batal</button>
                        </td>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td>Abc</td>
                        <td>-</td>
                        <td>1222</td>
                        <td>2/2/2021</td>
                        <td>-</td>
                        <td>-</td>
                        <td>- Hari</td>
                        <td>Rusak</td>
                        <td>
                            {{-- <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#DetailModal">Detail</button> --}}
                            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal">Edit</button>
                            {{-- <button type="button" class="btn btn-danger btn-sm" >Batal</button> --}}
                        </td>
                      </tr>
                      {{-- Modal edit --}}
                      <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModal" aria-hidden="true">
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
                                      <input class="form-control" type="text" placeholder="Title" name="name" disabled>
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
                                    <div class="form-group mb-3">
                                      <label class="col-form-label">Lama Pengerjaan</label>
                                      <input class="form-control" type="number" placeholder="Lama Pengerjaan" name="name" >
                                      {{-- <input  id="barang" type="text"
                                                    class="form-control @error('barang') is-invalid @enderror" placeholder="Nama Barang" name="barang"
                                                    value="{{ old('barang') }}" required autocomplete="barang"  autofocus> --}}
                                      @error('barang')
                                        <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                        </span>
                                      @enderror
                                    </div>
                                      <div class="form-group row">
                                          <label class="col-sm-3 col-form-label">File</label>
                                          <div class="col-sm-9">
                                            <input class="form-control" type="file" id="thumbnail" name="image">
                                          </div>
                                      </div>


                                      <div class="modal-footer ">
                                        <button class="btn btn-primary">Simpan</button>
                                        <button class="btn btn-secondary" data-dismiss="modal" aria-label="Close">Batal</button>
                                      </div>
                                  </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- end modal edit --}}
                  </tbody>
              </table>
            </div>

            </div>
        </div>
      </div>
    </div>
  </div>
@endsection
