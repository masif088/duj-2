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
                    <h5>Gudang</h5>
                </div>
                <div class="card-body">

                    <!-- Tool -->
                    <div class="dropdown-basic">
                        <div class="row justify-content-end">
                            <div style="padding-right: 10px;">
                              @if(auth()->user()->role == 'head')
                                <button class="btn btn-success btn-lg" type="button" data-toggle="modal"
                                    data-target="#addReward">Tambah</button>
                                {{-- Modal add --}}
                                <div class="modal fade" id="addReward" tabindex="-1" role="dialog"
                                    aria-labelledby="addReward" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Tambah Gudang</h5>
                                                <button class="close" type="button" data-dismiss="modal"
                                                    aria-label="Close"><span aria-hidden="true">×</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="theme-form" action="{{route('gudang.create')}}"
                                                    method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="form-group">
                                                        <input class="form-control" type="text"
                                                            placeholder="Nama" name="name">
                                                    </div>
                                                    <div class="modal-footer ">
                                                        <button class="btn btn-primary">Tambah</button>
                                                        <button class="btn btn-secondary" data-dismiss="modal"
                                                            aria-label="Close">Batal</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
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
                                    <th>Nama</th>
                                    @if(auth()->user()->role == 'head')
                                    <th>action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($gudang as $i => $b)

                                <tr>
                                    <td>{{$i+1}}</td>
                                    <td>{{$b->name}}</td>
                                    @if(auth()->user()->role == 'head')
                                    <td>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#editModal{{$b->id}}">Ubah</button>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#deleteModal{{$b->id}}">Hapus</button>
                                    </td>
                                </tr>

                                {{-- Modal edit --}}
                                <div class="modal fade" id="editModal{{$b->id}}" tabindex="-1" role="dialog"
                                    aria-labelledby="editModal" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Ubah</h5>
                                                <button class="close" type="button" data-dismiss="modal"
                                                    aria-label="Close"><span aria-hidden="true">×</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="theme-form" action="{{route('gudang.edit',$b->id)}}"
                                                    method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('put')
                                                    <div class="form-group">
                                                        <input class="form-control" type="text"
                                                            placeholder="Nama" name="name" value="{{$b->name}}">
                                                    </div>
                                                    <div class="modal-footer ">
                                                        <button class="btn btn-primary">Simpan</button>
                                                        <button class="btn btn-warning" data-dismiss="modal"
                                                            aria-label="Close">Batal</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- end modal edit --}}

                                {{-- Modal Delete --}}
                                <div class="modal fade" id="deleteModal{{$b->id}}" tabindex="-1" role="dialog"
                                    aria-labelledby="deleteModal" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Hapus</h5>
                                                <button class="close" type="button" data-dismiss="modal"
                                                    aria-label="Close"><span aria-hidden="true">×</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="theme-form" action="{{route('gudang.delete',$b->id)}}"
                                                    method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('delete')
                                                    <p>Apakah anda yakin akan menghapus?</p>
                                                    <div class="modal-footer ">
                                                        <button type="submit" class="btn btn-primary">Hapus</button>
                                                        <button class="btn btn-secondary" data-dismiss="modal"
                                                            aria-label="Close">Batal</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                {{-- end modal Delete --}}
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
