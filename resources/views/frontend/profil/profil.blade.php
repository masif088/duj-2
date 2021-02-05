@extends('frontend.layouts.master')
@section('content')
  <div class="page-header">
  </div>
  <div class="container-fluid">
    <div class="edit-profile">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title mb-0">My Profile</h4>
              <div class="card-options"><a class="card-options-collapse" href="#" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-toggle="card-remove"><i class="fe fe-x"></i></a></div>
            </div>
            <div class="card-body">
              <form class="form theme-form">
                <div class="row mb-2">
                  <div class="col-auto"><img class="img-70 rounded-circle" alt="" src="{{asset('/assets/images/user/7.jpg')}}"></div>
                  <div class="col">
                    <h3 class="mb-1">MARK JECNO</h3>
                      <p class="mb-4">ADMIN</p>
                  </div>
                </div>
                <div class="form-group mb-3">
                  <label class="col-form-label">Nama</label>
                  <input  id="nama" type="text"
                                class="form-control @error('nama') is-invalid @enderror" placeholder="Nama" name="nama"
                                value="{{ old('nama') }}" required autocomplete="nama"  autofocus>
                  @error('nama')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="form-group mb-3">
                  <label class="form-label">Email-Address</label>
                  <input  id="email" type="email"
                                class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email"
                                value="{{ old('email') }}" required autocomplete="email"  autofocus>
                  @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="form-group mb-3">
                  <label class="form-label">Password</label>
                  <input id="password" type="password"
                                 class="form-control @error('password') is-invalid @enderror" name="password"
                                 required autocomplete="current-password">
                  @error('password')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="form-group mb-3">
                  <label class="form-label">Alamat</label>
                  <textarea rows="5"  id="alamat" type="text"
                                class="form-control @error('alamat') is-invalid @enderror" placeholder="Alamat" name="alamat"
                                value="{{ old('alamat') }}" required autocomplete="alamat"  autofocus></textarea>
                  @error('alamat')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="form-group mb-3">
                  <label class="col-form-label">No HP</label>
                  <input  id="nohp" type="text"
                                class="form-control @error('nohp') is-invalid @enderror" placeholder="No HP" name="nohp"
                                value="{{ old('nohp') }}" required autocomplete="nohp"  autofocus>
                  @error('nohp')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label class="col-sm-3 col-form-label">Foto</label>
                  <input class="form-control" type="file">
                </div>
                <div class="form-footer">
                  <div class="form-group">
                      <div class="col-md-6 col-md-offset-4">
                        <input type="button" id="confirmedit" class="btn btn-danger" value="Edit"/>

                        <button type="button" class="btn btn-primary" id="btnupdate" data-toggle="modal" data-target="#modalEdit">
                            Update
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
  </div>
@endsection
@section('script')
  <script type="text/javascript">
  $(document).ready(function() {
      $( ".form-control" ).prop( "disabled", true );
      $('#btnupdate').hide();
  });

  $("#confirmedit").click(function(){
      $('#btnupdate').show();
      $('#confirmedit').hide();
      $( ".form-control" ).prop( "disabled", false );
  });
  $(document).ready(function() {
      $( ".resize" ).prop( "disabled", true );
      $('#btnupdate').hide();
  });

  $("#confirmedit").click(function(){
      $('#btnupdate').show();
      $('#confirmedit').hide();
      $( ".resize" ).prop( "disabled", false );
  });
  </script>
  <script>
       $(document).ready(function(){
            $('.resize').focus(function(){
                 $(this).animate({"height":"200px",}, "fast");
            });
            $('.resize').blur(function(){
                 $(this).animate({"height": "100px",}, "fast" );
            });
       });
     </script>
@endsection
