@extends('frontend.layouts.master')
@section('content')
  <div class="page-header">
  </div>
  <div class="container-fluid">
    <div class="edit-profile">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title mb-0">Service</h4>
              <div class="card-options"><a class="card-options-collapse" href="#" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-toggle="card-remove"><i class="fe fe-x"></i></a></div>
            </div>
            <div class="card-body">
              <form class="theme-form" action="{{route('serviceInfra.edit',$id->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group mb-3">
                  <label class="col-form-label">Nama Barang</label>
                  <input class="form-control" type="text" placeholder="ABC" name="name" value="{{$id->infra->name}}" disabled>
                  {{-- <input  id="barang" type="text"
                                class="form-control @error('barang') is-invalid @enderror" placeholder="Nama Barang" name="barang"
                                value="{{ old('barang') }}" required autocomplete="barang"  autofocus> --}}
                  @error('barang')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>

                <div class="form-group mb-3">
                  <label class="col-form-label">Lama Pengerjaan (Hari)</label>
                  <input class="form-control" type="number" placeholder="Lama Pengerjaan" name="lama" value="{{$id->lama}}">
                  {{-- <input  id="barang" type="text"
                                class="form-control @error('barang') is-invalid @enderror" placeholder="Nama Barang" name="barang"
                                value="{{ old('barang') }}" required autocomplete="barang"  autofocus> --}}
                  @error('barang')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="form-group mb-3">
                  <label class="form-label">Sparepart</label>
                  <textarea rows="5"  id="Sparepart" type="text"
                                class="form-control @error('sparepart') is-invalid @enderror" placeholder="sparepart" name="sparepart"
                                value="{{ old('sparepart') }}" required autocomplete="sparepart"  autofocus>{{$id->sparepart}}</textarea>
                  @error('sparepart')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="form-gorup mb-3">
                  <label class="form-label">Status Pengerjaan</label>
                  <select  class="js-example-basic-single form-control @error('barang') is-invalid @enderror" placeholder="Nama Barang" name="status"
                  value="{{ old('barang') }}" required autocomplete="barang"  autofocus>
                    <option value="selesai">Selesai</option>
                    <option value="tidak">Belum</option>
                  </select>
                </div>
                  {{-- <div class="form-group row">
                      <label class="col-sm-3 col-form-label">File</label>
                      <div class="col-sm-9">
                        <input class="form-control" type="file" id="thumbnail" name="image">
                      </div>
                  </div> --}}


                  <div class="modal-footer ">
                    <button class="btn btn-primary">Simpan</button>
                    <button class="btn btn-secondary" data-dismiss="modal" aria-label="Close">Batal</button>
                  </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
