@extends('frontend.layouts.master')
@section('content')
  <div class="page-header">
  </div>
  <div class="container-fluid">
    <div class="row starter-main">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <!-- <div class="pull-right mr-4"><a href="#">Edit Profile Playlist</a></div> -->
            <h5>Barang</h5>
          </div>
          <div class="card-body">

            <!-- Tool -->
              <div class="dropdown-basic">
                <div class="row justify-content-end">
                  <div style="padding-right: 10px;">
                </div>
              </div>

            </div>
            <!-- End Tool -->
            <hr>
            <div class="table-responsive invoice-table" id="table">
              <table class="table table-bordered table-striped">
                  <thead class="active">
                      <tr>
                          <th>No</th>
                          {{-- <th>Nama barang</th> --}}
                          <th>Tanggal Mutasi</th>
                          {{-- <th>Kode Barcode</th> --}}
                          <th>Kode Mutasi</th>
                          <th>Gudang Tujuan</th>
                          <th>Status</th>
                          <th>action</th>
                      </tr>
                      </thead>
                  <tbody>
                    @foreach ($mutasis as $i => $m)
                        
                    <tr>
                      <td>{{$i+1}}</td>
                      {{-- <td>{{$m->barcode->masuk->barang->name}}</td> --}}
                      <td>{{$m->created_at->format('d-M-Y')}}</td>
                        {{-- <td>{{$m->barcode->kode}}</td> --}}
                        <td>{{$m->kode_mutasi}}</td>
                        <td>{{$m->barcode->masuk->gudang->name}} -> {{$m->gudang->name}}</td>
                        <td>{{$m->status}}</td>
                        <td>
                          @if ($m->status != 'diterima' && $m->status != 'batal')

                          {{-- <a href="{{route('mutasi.edit',$m->id)}}">
                            <button type="button" class="btn btn-info btn-sm" >Edit</button>
                          </a> --}}
                              <a href="{{route('mutasi.batal',$m->id)}}">
                                <button type="button" class="btn btn-danger btn-sm" >Batal</button>

                              </a>
                          @endif
                          <a href="{{route('mutasi.invoice',$m->kode_mutasi)}}">
                            <button type="button" class="btn btn-success btn-sm" >Invoice</button>
                          </a>
                          </td>
                        </tr>
                        @endforeach
                        
                  </tbody>
              </table>
            </div>
            <div class="row">
              <div class="col-md-12">
                  {{$mutasis->links()}}
              </div>
          </div>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection
