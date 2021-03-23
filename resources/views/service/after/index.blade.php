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
                    @if (auth()->user()->role == 'head' || auth()->user()->role == 'ketua')
                    <button class="btn btn-success btn-lg" type="button" data-toggle="modal" data-target="#addReward">Pengajuan</button>
                    {{-- Modal add --}}
                    @endif
                    <div class="modal fade" id="addReward" tabindex="-1" role="dialog" aria-labelledby="addReward" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h5 class="modal-title">Service</h5>
                                  <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                              </div>
                              <div class="modal-body">
                                  <form class="theme-form" action="{{route('after.create')}}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-gorup mb-3">
                                      <div class="form-group mb-3">
                                        <label class="col-form-label">kode</label>
                                        <input  id="kode" type="text"
                                                      class="form-control @error('kode') is-invalid @enderror" placeholder="Barcode" name="kode"
                                                      value="{{ old('kode') }}" required autocomplete="kode"  autofocus>
                                        @error('kode')
                                          <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                          </span>
                                        @enderror
                                      </div>
                                    </div>
                                    <div class="form-gorup mb-3">
                                      <div class="form-group mb-3">
                                        <label class="col-form-label">nama pembeli</label>
                                        <input  id="nama_pembeli" type="text"
                                                      class="form-control @error('nama_pembeli') is-invalid @enderror" placeholder="nama_pembeli" name="nama_pembeli"
                                                      value="{{ old('nama_pembeli') }}" required autocomplete="nama_pembeli"  autofocus>
                                        @error('nama_pembeli')
                                          <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                          </span>
                                        @enderror
                                      </div>
                                    </div>
                                    <div class="form-gorup mb-3">
                                      <div class="form-group mb-3">
                                        <label class="col-form-label">alamat</label>
                                        <input  id="alamat" type="text"
                                                      class="form-control @error('alamat') is-invalid @enderror" placeholder="Alamat" name="alamat"
                                                      value="{{ old('alamat') }}" required autocomplete="alamat"  autofocus>
                                        @error('alamat')
                                          <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                          </span>
                                        @enderror
                                      </div>
                                    </div>
                                    <div class="form-gorup mb-3">
                                      <div class="form-group mb-3">
                                        <label class="col-form-label">no hp</label>
                                        <input  id="no_hp" type="number"
                                                      class="form-control @error('no_hp') is-invalid @enderror" placeholder="No Hp" name="no_hp"
                                                      value="{{ old('no_hp') }}" required autocomplete="no_hp"  autofocus>
                                        @error('no_hp')
                                          <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                          </span>
                                        @enderror
                                      </div>
                                    </div>
                                    <div class="form-group row">
                                      <label class="col-sm-3 col-form-label">Deskripsi Kerusakan</label>
                                      <div class="col-sm-9">
                                        <textarea class="form-control" required type="text" id="thumbnail" name="deskripsi"></textarea>
                                      </div>
                                  </div>
                                      <div class="form-group row">
                                          <label class="col-sm-3 col-form-label">File</label>
                                          <div class="col-sm-9">
                                            <input class="form-control" required type="file" id="thumbnail" name="file">
                                          </div>
                                      </div>


                                      <div class="modal-footer ">
                                        <button class="btn btn-primary">Tambah</button>
                                        <button class="btn btn-secondary" data-dismiss="modal" aria-label="Close">Batal</button>
                                      </div>
                                  </form>
                              </div>
                          </div>
                      </div>
                  </div>
                  {{-- end modal add --}}
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
                          <th>Nama Teknisi</th>
                          <th>Nama Pembeli</th>
                          <th>No Hp</th>
                          <th>Alamat</th>
                          <th>Kode</th>
                          <th>Tanggal Pengajuan</th>
                          <th>Tanggal Selesai</th>
                          <th>Sparepart</th>
                          <th>Deskripsi Kerusakan</th>
                          <th>Waktu Pengerjaan</th>
                          <th>File Pengajuan</th>
                          <th>Status</th>
                          <th>action</th>
                      </tr>
                      </thead>
                  <tbody>
                    @foreach ($after as $i => $s)
                    <tr>
                      <td>{{$i+1}}</td>
                      <td>{{$s->barcode->masuk->barang->name}}</td>
                      <td>{{$s->serviceAfter->user->name ?? 'null'}}</td>
                      <td>{{$s->nama_pembeli}}</td>
                      <td>{{$s->no_hp}}</td>
                      <td>{{$s->alamat}}</td>
                      <td>{{$s->barcode->kode}}</td>
                        <td>{{$s->created_at->format('d-M-Y')}}</td>
                        <td>{{$s->serviceAfter->status == 'selesai' ? $s->serviceAfter->updated_at->format('d-M-Y') : 'belum'}}</td>
                        <td>{{$s->serviceAfter->sparepart}}</td>
                        <td>{{$s->deskripsi}}</td>
                        <td>{{$s->serviceAfter->lama ?? 0}} Hari</td>
                        <td><a target="__blank" href="{{asset(Storage::url('after/'.$s->serviceAfter->file))}}">file</a></td>
                        <td>{{$s->serviceAfter->status == 'tidak' ? 'disetujui' : $s->serviceAfter->status}}</td>
                        <td>
                            {{-- <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#DetailModal">Detail</button> --}}
                            @if (auth()->user()->role == 'teknisi' && $s->serviceAfter->status != 'tolak'&& ($s->serviceAfter->status != 'batal' && $s->serviceAfter->status != 'selesai') && ($s->serviceAfter->user_id == null || $s->serviceAfter->user_id == auth()->user()->id) && $s->serviceAfter->status != 'pengajuan')
                            <a href="{{route('serviceAfter.edit',$s->id)}}">
                              <button type="button" class="btn btn-info btn-sm" >{!! $s->serviceAfter->user_id == null ? 'Ambil' :'Ubah'!!}</button>
                            </a>

                            @endif
                            @if ($s->serviceAfter->status == 'pengajuan' && auth()->user()->role == 'head' || auth()->user()->role == 'ketua')
                            <a href="{{route('serviceAfter.batal',$s->id)}}">
                              <button type="button" class="btn btn-info btn-sm" >Batal</button>
                            </a>

                            @endif
                            @if (auth()->user()->role == 'admin' && $s->serviceAfter->status != 'batal' && $s->serviceAfter->status != 'tolak' && $s->serviceAfter->status != 'tidak')
                                <a onclick="return confirm('apakah anda yakin?')" href="{{route('after.setuju',$s->id)}}">
                                  <button type="button" class="btn btn-success btn-sm" >setuju</button>
                                </a>
                                 <button type="button" data-toggle="modal" data-target="#alasan{{$s->id}}" class="btn btn-danger btn-sm" >Tolak</button>
                            @endif
                            @if ($s->serviceAfter->status == 'tolak')
                            <button type="button" data-toggle="modal" data-target="#alasann{{$s->id}}" class="btn btn-danger btn-sm" >Alasan</button>
                            @endif
                        </td>
                      </tr>
                      <div class="modal fade" id="alasan{{$s->id}}" tabindex="-1" role="dialog" aria-labelledby="addReward" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Tolak Service</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                </div>
                                <div class="modal-body">
                                    <form class="theme-form" action="{{route('after.tolak',$s->id)}}" method="POST" enctype="multipart/form-data">
                                      @csrf
                                      <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Alasan</label>
                                        <div class="col-sm-9">
                                          <textarea class="form-control" type="text" id="thumbnail" name="alasan" required></textarea>
                                        </div>
                                    </div>
                                        <div class="modal-footer ">
                                          <button class="btn btn-primary">Tambah</button>
                                          <button class="btn btn-secondary" data-dismiss="modal" aria-label="Close">Batal</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if ($s->serviceAfter->status == 'tolak')
                    <div class="modal fade" id="alasann{{$s->id}}" tabindex="-1" role="dialog" aria-labelledby="addReward" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h5 class="modal-title">Tolak Service</h5>
                                  <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                              </div>
                              <div class="modal-body">
                                    <div class="form-group row">
                                      <label class="col-sm-3 col-form-label">Alasan</label>
                                      <div class="col-sm-9">
                                        <textarea class="form-control" type="text" id="thumbnail" readonly name="alasan" required>{{$s->serviceAfter->alasan}}</textarea>
                                      </div>
                                  </div>
                                      <div class="modal-footer ">
                                        <button class="btn btn-secondary" data-dismiss="modal" aria-label="Close">Batal</button>
                                      </div>
                              </div>
                          </div>
                      </div>
                  </div>
                    @endif
                      @endforeach

                    </tbody>
              </table>
            </div>
            <div class="row">
              <div class="col-md-12">
                  {{$after->links()}}
              </div>
          </div>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection
