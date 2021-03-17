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
            <p>Kode Mutasi:{{Cookie::get('kodeMts') ?? 'null'}} <a href="{{route('mutasi.reset')}}"><span style="cursor:pointer" class="badge badge-primary">Reset</span></a>
            <br>
            Yang telah discan: {{$b}}
            <br>
            Gudang tujuan: {{$g->name ?? null}}
            </p>
          </div>
          <div class="card-body">
            <form action="{{route('mutasi.create')}}" method="POST" class="form theme-form">
              @csrf 
              @if($g == 'null') 
              <div class="form-group mb-3">
              <div class="col-form-label">Gudang Tujuan</div>
                <select name="gudang" class="js-example-basic-single col-sm-12 @error('barang') is-invalid @enderror" name="gudang"
                value="{{ old('gudang') }}" required autocomplete="gudang"  autofocus>
                @foreach ($gudang as $gu)
                @if ($gu->id != auth()->user()->gudang_id)
                <option value="{{$gu->id}}" {{ old('gudang') == $gu->id ? 'selected' : null }}>{{$gu->name}}</option>
                    
                @endif
                @endforeach  
                </select>
                @error('gudang')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              @else
              <input type="text" hidden name="gudang" value="{{$g->id}}">
              @endif
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
                  <div class="row">

                    <div class="col-md-2">
                      
                      <button type="submit" class="btn btn-primary" >
                        Tambah
                      </button>
                    </div>
                    <div class="col-md-2">
                      
                      <a href="{{route('mutasi.reset')}}" class="btn btn-success" >
                        Selesai
                      </a>
                    </div>
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
