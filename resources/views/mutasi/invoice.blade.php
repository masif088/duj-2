@extends('frontend.layouts.master')
@section('content')
<div class="page-header">
</div>
<div class="container">
    <div class="row">
        <div class="col-sm-12" id="printJS-form">
            <div class="card">
                <div class="card-body">
                    <div class="invoice">
                        <div>
                            <div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="media">
                                            <div class="media-left">
                                              {{-- <img class="media-object img-60"
                                                    src="../assets/images/other-images/logo-login.png" alt=""> --}}
                                                  </div>
                                            <div class="media-body m-l-20">
                                                <h4 class="media-heading">Dira Utama Jaya</h4>
                                                <p>admin@gmail.com<br><span class="digits">082222222222</span></p>
                                            </div>
                                        </div>
                                        <!-- End Info-->
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="text-md-right">
                                            <h3>Invoice #<span class="digits counter">{{$mutasi[0]->kode_mutasi}}</span>
                                            </h3>
                                            <p>Checkout berhasil: {{$mutasi[0]->created_at->format('M')}}<span
                                                    class="digits"> {{$mutasi[0]->created_at->format('d,Y')}}
                                                    |</span><span class="digits">
                                                    {{$mutasi[0]->created_at->format('H:s')}} WIB</span></p>
                                        </div>
                                        <!-- End Title-->
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <!-- End InvoiceTop-->
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="media">
                                        <div class="media-left">
                                          {{-- <img class="media-object rounded-circle img-60"
                                                src="../assets/images/user/1.jpg" alt=""> --}}
                                              </div>
                                        <div class="media-body m-l-20">
                                            <h4 class="media-heading">{{$mutasi[0]->user->name}}</h4>
                                            <p>{{$mutasi[0]->user->name}}<br><span
                                                    class="digits">{{$mutasi[0]->barcode->masuk->gudang->name}}</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="text-md-right" id="project">
                                        <h6>Barang Masuk</h6>

                                    </div>
                                </div>
                                <!-- End Invoice Mid-->
                                {{-- <div> --}}
                                <div class="table-responsive invoice-table" id="table">
                                    <table class="table table-bordered table-striped">
                                        <tbody>
                                            <tr>
                                                <td class="Rate">
                                                    <h6 class="p-2 mb-0">Tanggal</h6>
                                                </td>
                                                <td class="item">
                                                    <h6 class="p-2 mb-0">Barang</h6>
                                                </td>
                                                <td class="Hours">
                                                    <h6 class="p-2 mb-0">Gudang Awal</h6>
                                                </td>
                                                <td class="Rate">
                                                    <h6 class="p-2 mb-0">Gudang Tujuan</h6>
                                                </td>
                                                <td class="subtotal">
                                                    <h6 class="p-2 mb-0">Total</h6>
                                                </td>
                                            </tr>
                                            @php
                                            $p=0;
                                            @endphp
                                            @foreach ($mutasi as $m)

                                            <tr>
                                                <td>
                                                    <p class="m-0">{{$m->created_at->format('d-M-Y')}}</p>
                                                </td>
                                                <td>
                                                    <p class="m-0">{{$m->barcode->masuk->barang->name}}</p>
                                                </td>
                                                <td>
                                                    <p class="itemtext digits">{{$m->barcode->masuk->gudang->name}}</p>
                                                </td>
                                                <td>
                                                    <p class="itemtext digits">{{$m->gudang->name}}</p>
                                                </td>
                                                <td>
                                                    @php
                                                    $p+=$m->barcode->masuk->harga_satuan;
                                                    @endphp
                                                    <p class="itemtext digits">{{$m->barcode->masuk->harga_satuan}}</p>
                                                </td>

                                            <tr>
                                                @endforeach
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                {{-- <td class="Rate">
                            <h6 class="mb-0 p-2">Total</h6>
                          </td> --}}
                                                <td class="payment digits">
                                                    <h6 class="mb-0 p-2">{{$p}}</h6>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- End Table-->
                                <div class="row">
                                    <div class="col-md-8">

                                    </div>
                                    <div class="col-md-4">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 text-center mt-3">
                                <button class="btn btn btn-primary mr-2" type="button"
                                    onclick="printJS('printJS-form', 'html')">Print</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
