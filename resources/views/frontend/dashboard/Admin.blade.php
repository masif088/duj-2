@extends('frontend.layout-frontend.master')
@section('content')

<div class="container-fluid">
    <div class="page-header">
      <div class="row">
        <div class="col-sm-12 col-6">
          <h3>
            Admin
          </h3>
            <ol class="breadcrumb ">
              <li class="breadcrumb-item"><a href="index.html" data-original-title="" title=""><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg></a></li>
              <li class="breadcrumb-item">Dashboard</li>
            </ol>
        </div>
      </div>
    </div>

    {{-- widget --}}

    <div class="row">
        {{-- barang masuk, keluar ,service barang --}}
        <div class="col-sm-6 col-xl-6 col-lg-6">
            <div class="row">
                {{-- barang masuk --}}
                <div class="col-sm-12 col-xl-6 col-lg-6">
                    <div class="card o-hidden">
                      <div class="bg-success b-r-4 card-body">
                        <div class="media static-top-widget">
                          <div class="align-self-center text-center">
                            <i class="fa fa-long-arrow-up fa-2x"></i>
                          </div>
                          <div class="media-body">
                            <span class="m-0">barang</span>
                            <span class="m-0">masuk</span>
                            <h4 class="mb-0 counter">6659</h4><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-database icon-bg"><ellipse cx="12" cy="5" rx="9" ry="3"></ellipse><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path></svg>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
                {{-- barang keluar --}}
                <div class="col-sm-12 col-xl-6 col-lg-6">
                    <div class="card o-hidden">
                      <div class="bg-danger b-r-4 card-body">
                        <div class="media static-top-widget">
                          <div class="align-self-center text-center">
                            <i class="fa fa-long-arrow-down fa-2x"></i>
                          </div>
                          <div class="media-body">
                            <span class="m-0">barang</span>
                            <span class="m-0">keluar</span>
                            <h4 class="mb-0 counter">6659</h4><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-database icon-bg"><ellipse cx="12" cy="5" rx="9" ry="3"></ellipse><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path></svg>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
                {{-- service barang --}}
                <div class="col-sm-12 col-xl-12 col-lg-6 notification">
                        <div class="card">
                            <div class="card-header card-no-border">
                            <div class="header-top">
                                <h5 class="m-0">Service barang</h5>

                            </div>
                            </div>
                            <div class="card-body pt-0">
                            <div class="media">
                                <div class="media-body">
                                <p>20-04-2020 <span>10:10</span></p>
                                <h6>nama barang<span class="dot-notification"></span></h6>
                                <span>barang saya rusak karena jatuh...</span>
                                </div>
                            </div>
                            <div class="media">
                                <div class="media-body">
                                <p>20-04-2020<span class="pl-1">Today</span><span class="badge badge-secondary">New</span></p>
                                <h6>Tello just like your product<span class="dot-notification"></span></h6><span>Quisque a consequat ante sit amet magna... </span>
                                </div>
                            </div>
                            <div class="media">
                                <div class="media-body">
                                <div class="d-flex mb-3">
                                    <div class="inner-img"><img class="img-fluid" src="../assets/images/notification/1.jpg" alt="Product-1" data-original-title="" title=""></div>
                                    <div class="inner-img"><img class="img-fluid" src="../assets/images/notification/2.jpg" alt="Product-2" data-original-title="" title=""></div>
                                </div><span class="mt-3">Quisque a consequat ante sit amet magna...</span>
                                </div>
                            </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        {{-- total stock barang dan quality check --}}
        <div class="col-sm-6 col-xl-6 col-lg-6 news">
            <div class="row">
                {{-- total stock barang --}}
                <div class="col-sm-12 col-xl-12">
                    <div class="card o-hidden">
                        <div class="bg-primary b-r-4 card-body">
                          <div class="media static-top-widget">
                            <div class="align-self-center text-center">
                              <i class="fa fa-suitcase fa-2x"></i>
                            </div>
                            <div class="media-body">
                              <span class="m-0">stock</span>
                              <span class="m-0">barang</span>
                              <h4 class="mb-0 counter">6659</h4><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-database icon-bg"><ellipse cx="12" cy="5" rx="9" ry="3"></ellipse><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path></svg>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
                {{-- quality check --}}
                <div class="col-sm-12 col-xl-12">
                    <div class="card">
                        <div class="card-header border-0">
                        <div class="header-top">
                            <h5 class="m-0">Quality &amp; check</h5>
                            <div class="card-header-right-icon">
                            <select class="button btn btn-primary">
                                <option>Today</option>
                                <option>Tomorrow</option>
                                <option>Yesterday</option>
                            </select>
                            </div>
                        </div>
                        </div>
                        <div class="card-body p-0">
                        <div class="news-update">
                            <h6>36% off For pixel lights Couslations Types.</h6><span>Lorem Ipsum is simply dummy...</span>
                        </div>
                        <div class="news-update">
                            <h6>We are produce new product this</h6><span> Lorem Ipsum is simply text of the printing... </span>
                        </div>
                        <div class="news-update">
                            <h6>50% off For COVID Couslations Types.</h6><span>Lorem Ipsum is simply dummy...</span>
                        </div>
                        </div>
                        <div class="card-footer">
                        <div class="bottom-btn"><a href="#" data-original-title="" title="">More...</a></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

</div>


@endsection
