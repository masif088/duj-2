@extends('frontend.layouts.master')
@section('content')
  <div class="page-header">
  </div>
  <div class="container-fluid">
    <div class="row second-chart-list third-news-update">
      <div class="col-xl-4 col-lg-12 xl-50 morning-sec box-col-12">
        <div class="card o-hidden profile-greeting " style="background-image: url('../assets/images/other-images/bg-profile.png'); color:white;" >
          <div class="card-body">
            <div class="media">
              <div class="badge-groups w-100">
                <div class="badge f-12"><i class="mr-1" data-feather="clock"></i><span id="txt"></span></div>
                {{-- <div class="badge f-12"><i class="fa fa-spin fa-cog f-14"></i></div> --}}
              </div>
            </div>
            <div class="greeting-user text-center">
              <div class="profile-vector"><img class="img-fluid" src="../assets/images/dashboard/welcome.png" alt=""></div>
              <h4 class="f-w-600"><span id="greeting">Good Morning</span> <span class="right-circle"><i class="fa fa-check-circle f-14 middle"></i></span></h4>
              <h4>{{auth()->user()->name}}</h4>
              <h5 style="color:white">Role : Head Office</h5>
              {{-- <div class="whatsnew-btn"><a class="btn btn-primary">Whats New !</a></div> --}}
              {{-- <div class="left-icon"><i class="fa fa-bell"> </i></div> --}}
            </div>
          </div>
        </div>
      </div>
      
      
      <div class="col-xl-12 col-lg-12 xl-50 calendar-sec box-col-6">
        <div class="card gradient-primary o-hidden">
          <div class="card-body">
            <div class="card-header card-no-border">
              <h5>Aktivitas Scan</h5>
            </div>
            <div class="card-body new-update pt-0">
              <div class="activity-timeline">
                @foreach ($masuk as $m)
                    
                <div class="media">
                  <div class="activity-dot-primary"></div>
                  <div class="media-body">
                    <p>{{$m->created_at->format('d-m-Y')}} <span>{{$m->created_at->format('H:s')}}</span></p>
                    <h6>{{$m->kode_akuntan}}<span class="dot-notification"></span></h6><span>Jumlah Barang:{{$m->kuantiti}}</span> | <span>Suplier:{{$m->suplier->name}}</span>
                  </div>
                </div>
                @endforeach

              </div>

            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
@endsection
{{-- @section('script')
  <script src="{{asset('assets/js/chart/google/google-chart-loader.js')}}"></script>
  <script src="{{asset('assets/js/chart/google/google-chart.js')}}"></script>
@endsection --}}
