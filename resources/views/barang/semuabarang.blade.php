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
            <h5>Semua Barang</h5>
          </div>
          <div class="card-body">

            {{-- <hr> --}}
            <div class="table-responsive invoice-table" id="table">
              <table class="table table-bordered table-striped">
                  <thead class="active">
                      <tr>
                          <th>No</th>
                          <th>Nama Barang</th>
                          <th>Aktif</th>
                          <th>Nonaktif</th>
                          <th>Harga</th>
                          <th>Action</th>
                      </tr>
                      </thead>
                  <tbody>
                    @foreach ($barang as $i=>$b)
                    <tr>
                      <td>{{$i+1}}</td>
                      <td>{{$b->name}}</td>
                      <td>{{$b->barcodes()->where('status','aktif')->count()}}</td>
                      <td>{{$b->barcodes()->where('status','nonaktif')->count()}}</td>
                      <td>
                        {{min($b->masuk()->pluck('harga_satuan')->toArray())}}-
                        {{max($b->masuk()->pluck('harga_satuan')->toArray())}}
                      </td>
                      <td><a href="{{route('barang.detail',$b->id)}}" class="btn btn-sm btn-primary">Detail</a> </td>
                    </tr>
                    @endforeach
                    


                  </tbody>
              </table>
            </div>
            <div class="row">
              <div class="col-md-12">
                  {{$barang->links()}}
              </div>
          </div>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection
