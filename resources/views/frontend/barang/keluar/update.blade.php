@extends('frontend.layout-frontend.master')
@section('head')
<link rel="stylesheet" type="text/css" href="{{asset('/assets/css/select2.css')}}">
@endsection
@section('content')
  <div class="page-header">
  </div>
  <div class="container-fluid">
    <div class="row starter-main">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <!-- <div class="pull-right mr-4"><a href="#">Edit Profile Playlist</a></div> -->
            <h5>Barang Keluar</h5>
          </div>
          <div class="card-body">
            <form class="form theme-form">

              <div class="form-group mb-3">
                <label class="col-form-label">Nama Barang</label>
                <input  id="barang" type="text"
                              class="form-control @error('nama') is-invalid @enderror" placeholder="Nama Barang" name="barang"
                              value="{{ old('barang') }}" required autocomplete="barang"  autofocus>
                @error('barang')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
                <div class="col-form-label">Gudang Tujuan</div>
                <select name="gudang" class="js-example-basic-single col-sm-12">
                  <option value="">tes</option>
                  <option value="">tes2</option>
                </select>
                <div class="form-group mb-3">
                  <label class="col-form-label">Barcode</label>
                  <input  id="barcode" type="text"
                                class="form-control @error('barcode') is-invalid @enderror" placeholder="barcode" name="barcode"
                                value="{{ old('barcode') }}" required autocomplete="barcode"  autofocus>
                  @error('barcode')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>

              <div class="form-footer">
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">

                      <button type="button" class="btn btn-primary" id="btnupdate" data-toggle="modal" data-target="#modalEdit">
                          Simpan
                      </button>
                        {{-- <button type="submit" class="btn btn-primary">Tambah</button> --}}
                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                    </div>
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('script')
  <script src="{{asset('/assets/js/select2/select2.full.min.js')}}"></script>
  <script src="{{asset('/assets/js/select2/select2-custom.js')}}"></script>
@endsection
