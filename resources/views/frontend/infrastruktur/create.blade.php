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
            <h5>Infrastruktur</h5>
          </div>
          <div class="card-body">
            <form action="p"class="form theme-form">

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

              <div class="form-footer">
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">

                      <button type="submit" class="btn btn-primary" >
                          Tambah
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
