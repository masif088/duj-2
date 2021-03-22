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
            <h5>Infrastruktur</h5>
          </div>
          <div class="card-body">
            <form action="{{route('infra.edit',$id->id)}}" method="POST" class="form theme-form">
              @csrf
              @method('put')
              <div class="form-group mb-3">
                <label class="col-form-label">Nama</label>
                <input  id="name" type="text"
                              class="form-control @error('name') is-invalid @enderror" placeholder="Nama" name="name"
                              value="{{ $id->name }}" required autocomplete="name"  autofocus>
                @error('name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

              <div class="form-footer">
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">

                      <button type="submit" class="btn btn-primary" >
                          Ubah
                      </button>
                        {{-- <button type="submit" class="btn btn-primary">Tambah</button> --}}
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
