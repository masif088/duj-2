@extends('frontend.layouts.master')
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
            <p>Kode Mutasi:{{Cookie::get('kodeMts') ?? 'null'}} <a href="{{route('mutasi.reset')}}"><span style="cursor:pointer" class="badge badge-primary">Reset</span></a></p>
          </div>
          <div class="card-body">
            <form action="{{route('mutasi.create')}}" method="POST" class="form theme-form">
              @csrf  
              <div class="form-group mb-3">
              <div class="col-form-label">Gudang Tujuan</div>
                <select name="gudang" class="js-example-basic-single col-sm-12 @error('barang') is-invalid @enderror" placeholder="Nama Barang" name="gudang"
                value="{{ old('gudang') }}" required autocomplete="gudang"  autofocus>
                @foreach ($gudang as $g)
                @if ($g->id != auth()->user()->gudang_id)
                <option value="{{$g->id}}" {{ old('gudang') == $g->id ? 'selected' : null }}>{{$g->name}}</option>
                    
                @endif
                @endforeach  
                </select>
                @error('gudang')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
                <div class="form-group mb-3">
                  <label class="col-form-label">kode</label>
                  <input  id="kode" type="text"
                                class="form-control @error('kode') is-invalid @enderror" placeholder="Barcode" name="kode"
                                value="{{ old('kode') }}" required autocomplete="kode"  autofocus>
                  @error('kode')
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
