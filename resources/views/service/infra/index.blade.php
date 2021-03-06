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
                                  <form class="theme-form" action="{{route('serviceInfra.create')}}" method="POST" enctype="multipart/form-data">
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
                                    <div class="form-group row">
                                      <label class="col-sm-3 col-form-label">Deskripsi Kerusakan</label>
                                      <div class="col-sm-9">
                                        <textarea class="form-control" type="text" id="thumbnail" name="deskripsi"></textarea>
                                      </div>
                                  </div>
                                      <div class="form-group row">
                                          <label class="col-sm-3 col-form-label">File</label>
                                          <div class="col-sm-9">
                                            <input class="form-control" type="file" id="thumbnail" name="file">
                                          </div>
                                      </div>


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
                    @foreach ($service as $i => $s)
                    <tr>
                      <td>{{$i+1}}</td>
                      <td>{{$s->infra->name}}</td>
                      <td>{{$s->user->name ?? 'null'}}</td>
                        <td>{{$s->infra->kode}}</td>
                        <td>{{$s->created_at->format('d-M-Y')}}</td>
                        <td>{{$s->status == 'selesai' ? $s->updated_at->format('d-M-Y') : 'belum'}}</td>
                        <td>{{$s->sparepart}}</td>
                        <td>{{$s->deskripsi}}</td>
                        <td>{{$s->lama ?? 0}} Hari</td>
                        <td><a target="__blank" href="{{asset(Storage::url('infra/'.$s->file))}}">file</a></td>
                        <td>{{$s->status == 'tidak' ? 'Disetujui' : $s->status}}</td>
                        <td>
                            @if (auth()->user()->role == 'teknisi' && $s->status != 'tolak' && ($s->user_id == null || $s->user_id == auth()->user()->id) && $s->status == 'tidak')
                            <a href="{{route('serviceInfra.edit',$s->id)}}">
                              <button type="button" class="btn btn-info btn-sm" >{!! $s->user_id == null ? 'Ambil' :'Edit'!!}</button>
                            </a>
                                
                            @endif
                            @if ($s->status != 'tolak' && auth()->user()->role == 'head' || auth()->user()->role == 'ketua')
                            <a href="{{route('serviceInfra.batal',$s->id)}}">
                              <button type="button" class="btn btn-info btn-sm" >Batal</button>
                            </a>
                                
                            @endif
                            @if (auth()->user()->role == 'admin' && $s->status != 'tolak' && $s->status == 'pengajuan')
                                <a onclick="return confirm('apakah anda yakin?')" href="{{route('serviceInfra.setuju',$s->id)}}">
                                  <button type="button" class="btn btn-success btn-sm" >setuju</button>
                                </a>
                                <button type="button" data-toggle="modal" data-target="#alasan{{$s->id}}" class="btn btn-danger btn-sm" >Tolak</button> 
                            @endif
                            @if ($s->status == 'tolak')
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
                                    <form class="theme-form" action="{{route('serviceInfra.tolak',$s->id)}}" method="POST" enctype="multipart/form-data">
                                      @csrf
                                      <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Alasan</label>
                                        <div class="col-sm-9">
                                          <textarea class="form-control" type="text" id="thumbnail" name="alasan" required></textarea>
                                        </div>
                                    </div>
                                        <div class="modal-footer ">
                                          <button class="btn btn-primary">Add</button>
                                          <button class="btn btn-secondary" data-dismiss="modal" aria-label="Close">Cancel</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if ($s->status == 'tolak')
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
                                        <textarea class="form-control" type="text" id="thumbnail" readonly name="alasan" required>{{$s->alasan}}</textarea>
                                      </div>
                                  </div>
                                      <div class="modal-footer ">
                                        <button class="btn btn-secondary" data-dismiss="modal" aria-label="Close">Cancel</button>
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

            </div>
        </div>
      </div>
    </div>
  </div>
@endsection
