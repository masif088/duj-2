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
            <h5>Infrastruktur</h5>
          </div>
          <div class="card-body">

            <!-- Tool -->
              <div class="dropdown-basic">
                <div class="row justify-content-end">
                  <div style="padding-right: 10px;">
                    <a href="{{route('infra.create')}}">
                      <button class="btn btn-success btn-lg" type="button" data-toggle="modal" data-target="#addReward">Tambah</button>

                    </a>
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
                          <th>Nama barang</th>
                          <th>Kode Barcode</th>
                          <th>Tanggal</th>
                          <th>Status</th>
                          <th>action</th>
                      </tr>
                      </thead>
                  <tbody>
                    @foreach ($infra as $i=>$in)
                    <tr>
                      <td>{{$i+1}}</td>
                      <td>{{$in->name}}</td>
                        <td>{{$in->kode}}</td>
                        <td>{{$in->created_at->format('d-M-Y')}}</td>
                        <td>{{$in->status}}</td>
                        <td>
                          <a href="{{route('infra.edit',$in->id)}}">
                            <button type="button" class="btn btn-info btn-sm" >Edit</button>  
                          </a>
                        </td>
                      </tr>
                      @endforeach

                    </tbody>
              </table>
            </div>

            </div>
        </div>
      </div>
    </div>
  </div>
@endsection
