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
                                          <input class="form-control" type="text" placeholder="Title" name="name">
                                      </div>
                                      <div class="form-group row">
                                          <label class="col-sm-3 col-form-label">Choose Thumbnail</label>
                                          <div class="col-sm-9">
                                            <input class="form-control" type="file" id="thumbnail" name="image">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                        <textarea name="Deskripsi" class="form-control" placeholder="Deskripsi" id="" cols="30" rows="10"></textarea>
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
                          <th>No</th>
                          <th>Title</th>
                          <th>Foto</th>
                          <th>Deskripsi</th>

                          <th>Action</th>
                      </tr>
                      </thead>
                  <tbody>
                      <tr>
                        <td>1</td>
                        <td>abc</td>
                        <td><a href="{{asset(Storage::url('../assets/images/product/1.png'))}}"itemprop="contentUrl" data-size="1600x950">
                          <img class="img-thumbnail" id="preview"  src="{{asset(Storage::url('../assets/images/product/1.png'))}}" itemprop="thumbnail"alt="Image description" style="height:200px ;width: 320px;" ></a></td>
                          <td style="width: 300px;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</td>

                        <td>
                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#DetailModal">Detail</button>
                            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal">Edit</button>
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal">Delete</button>

                        </td>

                      </tr>


                    {{-- Modal detail --}}
                    <div class="modal fade" id="DetailModal" tabindex="-1" role="dialog" aria-labelledby="DetailModal" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h5 class="modal-title">Detail Reward</h5>
                                  <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                              </div>
                              <div class="modal-body">
                                  <form class="theme-form" action="" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <center><a href="{{asset(Storage::url('../assets/images/product/1.png'))}}"
                                      itemprop="contentUrl" data-size="1600x950"><img class="img-thumbnail"
                                                                                      id="preview"
                                                                                      src="{{asset(Storage::url('../assets/images/product/1.png'))}}"
                                                                                      itemprop="thumbnail"
                                                                                      alt="Image description"
                                                                                      style="height:400px ;width: 720px;"></a>
                                    </center><br>
                                    <div class="form-group">
                                          <input class="form-control" type="text" placeholder="Title" name="name" readonly>
                                      </div>

                                      <div class="form-group">
                                        <textarea name="Deskripsi" class="form-control" placeholder="Deskripsi" id="" cols="30" rows="10" readonly></textarea>
                                      </div>

                                      <div class="modal-footer ">
                                        {{-- <button class="btn btn-primary">Save</button> --}}
                                        <button class="btn btn-secondary" data-dismiss="modal" aria-label="Close">Close</button>
                                      </div>
                                  </form>
                              </div>
                          </div>
                      </div>
                  </div>
                  {{-- end modal detail --}}

                  {{-- Modal edit --}}
                  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModal" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Reward</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body">
                                <form class="theme-form" action="" method="POST" enctype="multipart/form-data">
                                  @csrf
                                  <center><a href="{{asset(Storage::url('../assets/images/product/1.png'))}}"
                                    itemprop="contentUrl" data-size="1600x950"><img class="img-thumbnail"
                                                                                    id="preview"
                                                                                    src="{{asset(Storage::url('../assets/images/product/1.png'))}}"
                                                                                    itemprop="thumbnail"
                                                                                    alt="Image description"
                                                                                    style="height:400px ;width: 720px;"></a>
                                  </center><br>
                                  <div class="form-group">
                                    <input class="form-control" type="text" placeholder="Title" name="name">
                                  </div>
                                  <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Choose Thumbnail</label>
                                    <div class="col-sm-9">
                                      <input class="form-control" type="file" id="thumbnail" name="image">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <textarea name="Deskripsi" class="form-control" placeholder="Deskripsi" id="" cols="30" rows="10"></textarea>
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
