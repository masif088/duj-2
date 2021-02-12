@extends('frontend.layout-frontend.master')
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
              <h4>Tes</h4>
              <h5 style="color:white">Role : HO</h5>
              {{-- <div class="whatsnew-btn"><a class="btn btn-primary">Whats New !</a></div> --}}
              {{-- <div class="left-icon"><i class="fa fa-bell"> </i></div> --}}
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-8 xl-100 dashboard-sec box-col-12">
        <div class="card earning-card">
          <div class="card-body p-0">
            <div class="row m-0">
              <div class="col-xl-3 earning-content p-0">
                <div class="row m-0 chart-left">
                  <div class="col-xl-12 p-0 left_side_earning">
                    <h5>Dashboard</h5>
                    {{-- <p class="font-roboto">Overview of last month</p> --}}
                  </div>

                  <div class="col-xl-12 p-0 left_side_earning">
                    <h5>5 </h5>
                    <p class="font-roboto">Total Cabang</p>
                  </div>
                  <div class="col-xl-12 p-0 left_side_earning">
                    <h5>20</h5>
                    <p class="font-roboto">Total User</p>
                  </div>
                  <div class="col-xl-12 p-0 left_side_earning">
                    <h5>50</h5>
                    <p class="font-roboto">Total Barang</p>
                  </div>
                  {{-- <div class="col-xl-12 p-0 left-btn"><a class="btn btn-gradient">Summary</a></div> --}}
                </div>
              </div>
              <div class="col-xl-9 p-0">
                <div class="chart-right">
                  <div class="row m-0 p-tb">
                    <div class="col-xl-8 col-md-8 col-sm-8 col-12 p-0">
                      <div class="inner-top-left">
                        <ul class="d-flex list-unstyled">
                          {{-- <li>User</li> --}}
                        </ul>
                      </div>
                    </div>

                  </div>
                  <div class="row">
                    <div class="col-xl-12">
                      <div class="card-body p-0">
                        <div class="card-body chart-block">
                          <div class="chart-overflow" id="column-chart1"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-12 col-lg-12 xl-50 calendar-sec box-col-6">
        <div class="card gradient-primary o-hidden">
          <div class="card-body">
            <div class="card-header card-no-border">
              <h5>Aktivitas Scan</h5>
              {{-- <div class="card-header-right">
                <ul class="list-unstyled card-option">
                  <li><i class="fa fa-spin fa-cog"></i></li>
                  <li><i class="view-html fa fa-code"></i></li>
                  <li><i class="icofont icofont-maximize full-card"></i></li>
                  <li><i class="icofont icofont-minus minimize-card"></i></li>
                  <li><i class="icofont icofont-refresh reload-card"></i></li>
                  <li><i class="icofont icofont-error close-card"></i></li>
                </ul>
              </div> --}}
            </div>
            <div class="card-body new-update pt-0">
              <div class="activity-timeline">
                <div class="media">
                  <div class="activity-line"></div>
                  <div class="activity-dot-primary"></div>
                  <div class="media-body">
                    <p>20-04-2020 <span>10:10</span></p>
                    <h6>ABC<span class="dot-notification"></span></h6><span>Jumlah Barang:10</span> | <span>Status Barang:Bagus</span>
                  </div>
                </div>
                <div class="media">
                  <div class="activity-dot-primary"></div>
                  <div class="media-body">
                    <p>20-04-2020 <span>10:10</span></p>
                    <h6>ABC<span class="dot-notification"></span></h6><span>Jumlah Barang:10</span> | <span>Status Barang:Bagus</span>
                  </div>
                </div>
                <div class="media">
                  <div class="activity-dot-primary"></div>
                  <div class="media-body">
                    <p>20-04-2020 <span>10:10</span></p>
                    <h6>ABC<span class="dot-notification"></span></h6><span>Jumlah Barang:10</span> | <span>Status Barang:Bagus</span>
                  </div>
                </div>

              </div>

            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
@endsection
@section('script')
  <script src="../assets/js/chart/google/google-chart-loader.js"></script>
  <script src="../assets/js/chart/google/google-chart.js"></script>
@endsection
