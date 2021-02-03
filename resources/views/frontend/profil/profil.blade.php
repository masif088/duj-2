@extends('frontend.layouts.master')
@section('content')
  <div class="page-header">
    {{-- <div class="row">
      <div class="col-6">
        <h3>Edit Profile</h3>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
          <li class="breadcrumb-item">Users</li>
        </ol>
      </div>
    </div> --}}
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
              <form>
                <div class="row mb-2">
                  <div class="col-auto"><img class="img-70 rounded-circle" alt="" src="{{asset('/assets/images/user/7.jpg')}}"></div>
                  <div class="col">
                    <h3 class="mb-1">MARK JECNO</h3>
                      <p class="mb-4">ADMIN</p>
                  </div>
                </div>
                <div class="form-group mb-3">
                  <label class="form-label">Email-Address</label>
                  <input class="form-control" placeholder="your-email@domain.com">
                </div>
                <div class="form-group mb-3">
                  <label class="form-label">Password</label>
                  <input class="form-control" type="password" value="password">
                </div>
                <div class="form-group mb-3">
                  <label class="form-label">Alamat</label>
                  <textarea class="form-control" rows="5">On the other hand, we denounce with righteous indignation</textarea>
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
