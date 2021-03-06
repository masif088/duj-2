@extends('frontend.layouts.master')
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
                              <span class="m-0">Infrastruktur</span>
                              <span class="m-0">rusak</span>
                              <h4 class="mb-0 counter">{{$infra}}</h4><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-database icon-bg"><ellipse cx="12" cy="5" rx="9" ry="3"></ellipse><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path></svg>
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
                          </div>
                        </div>
                        <div class="card-body pt-0">
                          <div class="appointment-table table-responsive">
                            <table class="table table-bordernone">
                              <tbody>
                                @foreach ($after as $a)
                                    
                                <tr>
                                  <td class="img-content-box"><span class="d-block">{{$a->after->barcode->masuk->barang->name}}</span><span class="font-roboto"></span></td>
                                  <td>
                                    <p class="m-0 font-primary">{{$a->created_at->format('d-M-Y')}}</p>
                                  </td>
                                  <td class="text-right">
                                    <div class="button btn btn-{!!$a->status == 'tidak' ? 'success' :($a->status == 'pengajuan' ? 'primary' : 'danger') !!}">{{$a->status == 'tidak' ? 'Disetujui' : $a->status}}<i class="fa fa-check-circle ml-2"></i></div>
                                  </td>
                                </tr>
                                @endforeach

                              </tbody>
                            </table>
                          </div>
                        </div>

                        <div class="card-footer pt-0 border-top-0 news">
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
                  @foreach ($infraP as $p)
                      
                  <div class="media">
                    <div class="media-body">
                      <p>{{$p->created_at->format('d-M-Y')}} <span>{{$p->created_at->format('H:m')}}</span></p>
                      <h6>{{$p->infra->name}}<span class="dot-notification"></span></h6>
                      <span>{{$p->deskripsi}}</span>
                      
                    </div>
                  </div>
                  @endforeach
            

                </div>
            </div>
        </div>

    </div>
</div>

@endsection
