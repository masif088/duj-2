@extends('frontend.layouts.master')
@section('content')
  <div class="page-header">
  </div>
  <div class="container-fluid">
    <div class="edit-profile">
      <form action="{{route('user.edit',$user->id)}}" method="post" enctype="multipart/form-data">
      @csrf
      @method('put')
      
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
                  <div class="col-auto"><img class="img-70 rounded-circle" alt="" src="{{asset($user->img ? Storage::url('/user/'.$user->img) : '/assets/images/user/7.jpg')}}"></div>
                  <div class="col">
                    <h3 class="mb-1">{{$user->name}}</h3>
                      <p class="mb-4">{{$user->role}}</p>
                  </div>
                </div>
                <div class="form-group mb-3">
                  <label class="col-form-label">Nama</label>
                  <input  id="nama" type="text"
                                class="form-control @error('name') is-invalid @enderror" placeholder="name" name="name"
                                value="{{ $user->name }}" required autocomplete="name"  autofocus>
                  @error('name')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="form-group mb-3">
                  <label class="form-label">Email-Address</label>
                  <input  id="email" type="email"
                                class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email"
                                value="{{ $user->email }}" required autocomplete="email"  autofocus>
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
                                 autocomplete="current-password">
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
                                 required autocomplete="alamat"  autofocus>{{$user->alamat}}</textarea>
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
                                value="{{ $user->no_hp }}" required autocomplete="no_hp"  autofocus>
                  @error('no_hp')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <input type="text" name="role" value="{{$user->role}}" hidden>
                <div class="form-group">
                  <label class="col-sm-3 col-form-label">Foto</label>
                  <input class="form-control" type="file" name="img">
                </div>
                <div class="form-footer">
                  <div class="form-group">
                      <div class="col-md-6 col-md-offset-4">
                        <input type="button" id="confirmedit" class="btn btn-danger" value="Edit"/>
                        <button type="submit" class="btn btn-primary" id="btnupdate" data-toggle="modal" data-target="#modalEdit">
                            Update
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
  </form>
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
