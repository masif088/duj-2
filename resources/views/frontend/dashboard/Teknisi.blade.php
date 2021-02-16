@extends('frontend.layout-frontend.master')
@section('content')

<div class="container-fluid">

    {{-- breadcrumb --}}
    <div class="page-header">
      <div class="row">
        <div class="col-sm-12 col-6">
          <h3>
            Teknisi
          </h3>
            <ol class="breadcrumb ">
              <li class="breadcrumb-item"><a href="index.html" data-original-title="" title=""><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg></a></li>
              <li class="breadcrumb-item">Dashboard</li>
            </ol>
        </div>
      </div>
    </div>

    <div class="row">

        {{--total infrastruktur dan permintaan garansi --}}
        <div class="col-sm-6 col-xl-6 col-lg-6">

            <div class="row">
                {{-- infrastruktur rusak --}}
                <div class="col-sm-12">
                    <div class="card o-hidden">
                        <div class="bg-success b-r-4 card-body">
                          <div class="media static-top-widget">
                            <div class="align-self-center text-center">
                              <i class="fa fa-wrench fa-2x"></i>
                            </div>
                            <div class="media-body">
                              <span class="m-0">infstruktur</span>
                              <span class="m-0">rusak</span>
                              <h4 class="mb-0 counter">6659</h4><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-database icon-bg"><ellipse cx="12" cy="5" rx="9" ry="3"></ellipse><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path></svg>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
                {{-- permintaan garansi --}}
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header card-no-border">
                          <div class="header-top">
                            <h5 class="m-0">Permintaan garansi</h5>
                            {{-- <div class="card-header-right-icon">
                                <h5 class="m-0">After sale</h5>
                            </div> --}}
                          </div>
                        </div>
                        <div class="card-body pt-0">
                          <div class="appointment-table table-responsive">
                            <table class="table table-bordernone">
                              <tbody>

                                {{-- loop data --}}

                                <tr>
                                  <td><img class="img-fluid img-40 rounded-circle mb-3" src="../assets/images/appointment/app-ent.jpg" alt="Image description" data-original-title="" title="">
                                    <div class="status-circle bg-primary"></div>
                                  </td>
                                  <td class="img-content-box"><span class="d-block">Venter Loren</span><span class="font-roboto">Now</span></td>
                                  <td>
                                    <p class="m-0 font-primary">28 Sept</p>
                                  </td>
                                  <td class="text-right">
                                    <div class="button btn btn-primary">Done<i class="fa fa-check-circle ml-2"></i></div>
                                  </td>
                                </tr>
                                <tr>
                                  <td><img class="img-fluid img-40 rounded-circle" src="../assets/images/appointment/app-ent.jpg" alt="Image description" data-original-title="" title="">
                                    <div class="status-circle bg-primary"></div>
                                  </td>
                                  <td class="img-content-box"><span class="d-block">John Loren</span><span class="font-roboto">11:00</span></td>
                                  <td>
                                    <p class="m-0 font-primary">22 Sept</p>
                                  </td>
                                  <td class="text-right">
                                    <div class="button btn btn-danger">Pending<i class="fa fa-check-circle ml-2"></i></div>
                                  </td>
                                </tr>

                              </tbody>
                            </table>
                          </div>
                        </div>

                        <div class="card-footer pt-0 border-top-0 news">
                            <div class="bottom-btn"><a href="#" data-original-title="" title="">More...</a></div>
                          </div>
                    </div>
                </div>
            </div>



        </div>
        {{-- permintaan perbaikan --}}
        <div class="col-sm-6 col-xl-6 col-lg-6 notification">
            <div class="card">
                <div class="card-header card-no-border">
                <div class="header-top">
                    <h5 class="m-0">Permintaan perbaikan</h5>

                </div>
                </div>
                <div class="card-body pt-0">
                <div class="media">
                    <div class="media-body">
                    <p>20-04-2020 <span>10:10</span></p>
                    <h6>nama barang<span class="dot-notification"></span></h6>
                    <span>barang saya rusak karena jatuh...</span>
                    <div class="d-flex mb-1 mt-3">
                        <div class="inner-img"><img class="img-fluid" src="../assets/images/notification/1.jpg" alt="Product-1" data-original-title="" title=""></div>

                    </div>
                    </div>
                </div>
                <div class="media">
                    <div class="media-body">
                    <p>20-04-2020<span class="pl-1">Today</span><span class="badge badge-secondary">New</span></p>
                    <h6>Tello just like your product<span class="dot-notification"></span></h6><span>Quisque a consequat ante sit amet magna... </span>
                    <div class="d-flex mb-1 mt-3">
                        <div class="inner-img"><img class="img-fluid" src="../assets/images/notification/1.jpg" alt="Product-1" data-original-title="" title=""></div>

                    </div>
                    </div>
                </div>

                </div>
            </div>
        </div>

    </div>
</div>

@endsection
