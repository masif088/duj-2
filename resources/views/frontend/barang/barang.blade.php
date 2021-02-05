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
                    <button class="btn btn-success btn-lg" type="button" data-toggle="modal" data-target="#addReward">Add</button>
                    {{-- Modal add --}}
                    <div class="modal fade" id="addReward" tabindex="-1" role="dialog" aria-labelledby="addReward" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h5 class="modal-title">Tambah barang</h5>
                                  <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                              </div>
                              <div class="modal-body">
                                  <form class="theme-form" action="" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                          <input class="form-control" type="text" placeholder="Nama Barang" name="name">
                                      </div>

                                      {{-- <div class="form-group">
                                          <input class="form-control" type="number" placeholder="Point" name="Point">
                                      </div>
                                      <div class="form-group">
                                        <input placeholder="Jangka Waktu" class="datepicker-here form-control digits" type="text" data-range="true" data-multiple-dates-separator=" - " data-language="en" data-original-title="" title="">
                                      </div> --}}
                                      <div class="modal-footer ">
                                        <button class="btn btn-primary">Add</button>
                                        <button class="btn btn-secondary" data-dismiss="modal" aria-label="Close">Cancel</button>
                                      </div>
                                  </form>
                              </div>
                          </div>
                      </div>
                  </div>
                  {{-- end modal add --}}
                    {{-- <div class="dropdown">
                      <div class="btn-group mb-0">
                        <button class="dropbtn btn-info btn-round" type="button">Filter <span><i class="icofont icofont-arrow-down"></i></span></button>
                        <div class="dropdown-content"><a href="#">Selesai</a><a href="#">Belum selesai</a><a href="#">Pending</a>
                        </div>
                      </div>
                    </div> --}}
                </div>
              </div>

            </div>
            <!-- End Tool -->
            <hr>
            <div class="table-responsive invoice-table" id="table">
              <table class="table table-bordered table-striped">
                  <thead class="active">
                      <tr>
                          <th>Nama barang</th>
                          <th>action</th>
                      </tr>
                      </thead>
                  <tbody>
                      <tr>
                        <td>abc</td>
                        <td>
                            {{-- <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#DetailModal">Detail</button> --}}
                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editModal">Edit</button>
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal">Delete</button>
                        </td>
                      </tr>

                  {{-- Modal edit --}}
                  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModal" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Barang</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body">
                                <form class="theme-form" action="" method="POST" enctype="multipart/form-data">
                                  @csrf

                                  <div class="form-group">
                                    <input class="form-control" type="text" placeholder="Nama Barang" name="name">
                                  </div>
                                    <div class="modal-footer ">
                                      <button class="btn btn-primary">Add</button>
                                      <button class="btn btn-warning" data-dismiss="modal" aria-label="Close">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end modal edit --}}

                {{-- Modal Delete --}}
                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title">Delete Reward</h5>
                              <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                          </div>
                          <div class="modal-body">
                              <form class="theme-form" action="" method="POST" enctype="multipart/form-data">
                                @csrf
                                <h1>Apakah anda yakin akan menghapus "Tittle"?</h1>
                                  <div class="modal-footer ">
                                    <button class="btn btn-primary">Delete</button>
                                    <button class="btn btn-secondary" data-dismiss="modal" aria-label="Close">Cancel</button>
                                  </div>
                              </form>
                          </div>
                      </div>
                  </div>
              </div>
              {{-- end modal Delete --}}




                  </tbody>
              </table>
            </div>

            </div>
        </div>
      </div>
    </div>
  </div>
@endsection
