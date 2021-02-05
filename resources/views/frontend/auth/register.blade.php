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
              <h4 class="card-title mb-0">Create</h4>
              <div class="card-options"><a class="card-options-collapse" href="#" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-toggle="card-remove"><i class="fe fe-x"></i></a></div>
            </div>
            <div class="card-body">
              <form class="form theme-form">
                <div class="form-group mb-3">
                  <label class="col-form-label">Nama</label>
                  <input  id="nama" type="text"
                                class="form-control @error('nama') is-invalid @enderror" placeholder="Nama" name="nama"
                                value="{{ old('nama') }}" required autocomplete="nama"  autofocus>
                  @error('nama')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="exampleFormControlSelect9">Role</label>
                  <select class="form-control digits" id="exampleFormControlSelect9">
                    <option disabled selected hidden></option>
                    <option>admin</option>
                    <option>teknisi</option>
                    <option>ketua cabang</option>
                    <option>Head office</option>
                  </select>
                </div>
                <div class="form-group mb-3">
                  <label class="form-label">Email-Address</label>
                  <input  id="email" type="email"
                                class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email"
                                value="{{ old('email') }}" required autocomplete="email"  autofocus>
                  @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="form-group mb-3">
                  <label class="form-label">Password</label>
                  <input id="password" type="password"
                                 class="form-control @error('password') is-invalid @enderror" name="password"
                                 required autocomplete="current-password">
                  @error('password')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="form-group mb-3">
                  <label class="form-label">Alamat</label>
                  <textarea rows="5"  id="alamat" type="text"
                                class="form-control @error('alamat') is-invalid @enderror" placeholder="Alamat" name="alamat"
                                value="{{ old('alamat') }}" required autocomplete="alamat"  autofocus></textarea>
                  @error('alamat')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="form-group mb-3">
                  <label class="col-form-label">No HP</label>
                  <input  id="nohp" type="text"
                                class="form-control @error('nohp') is-invalid @enderror" placeholder="No HP" name="nohp"
                                value="{{ old('nohp') }}" required autocomplete="nohp"  autofocus>
                  @error('nohp')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label class="col-sm-3 col-form-label">Foto</label>
                  <input class="form-control" type="file">
                </div>
                <div class="form-footer">
                  <div class="form-group">
                      <div class="col-md-6 col-md-offset-4">
                        <input type="button" id="" class="btn btn-success" value="Save"/>

                          {{-- <button type="submit" class="btn btn-primary">Tambah</button> --}}
                          <input type="hidden" name="_token" value="{{ Session::token() }}">
                      </div>
                  </div>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

{{-- @section('auth')
  <div class="authentication-box">
    <div class="mt-4">
      <div class="card-body">
        <div class="cont text-center">
          <div>
            <form class="theme-form">
              <h4>Signup</h4><br>
              <div class="form-group">
                <label class="col-form-label pt-0">Name</label>
                <input  id="name" type="text"
                              class="form-control @error('name') is-invalid @enderror" name="name"
                              value="{{ old('name') }}" required autocomplete="name"  autofocus>
                @error('name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="form-group">
                <label for="exampleFormControlSelect9">Role</label>
                <select class="form-control digits" id="exampleFormControlSelect9">
                  <option disabled selected hidden></option>
                  <option>admin</option>
                  <option>teknisi</option>
                  <option>ketua cabang</option>
                  <option>Head office</option>
                </select>
              </div>
              <div class="form-group ">
                <label class="col-form-label pt-0">Telephone</label>
                <input  id="nohp" type="tel"
                              class="form-control @error('nohp') is-invalid @enderror" name="nohp"
                              value="{{ old('nohp') }}" required autocomplete="nohp"  autofocus>
                @error('nohp')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="form-group">
                <label class="col-form-label pt-0">Email</label>
                <input  id="email" type="email"
                              class="form-control @error('email') is-invalid @enderror" name="email"
                              value="{{ old('email') }}" required autocomplete="email"  autofocus>
                @error('email')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="form-group">
                <label class="col-form-label">Password</label>
                <input id="password" type="password"
                               class="form-control @error('password') is-invalid @enderror" name="password"
                               required autocomplete="current-password">
                @error('password')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="form-group row mt-3 mb-0">
                <button class="btn btn-primary btn-block" type="submit">Signup</button>
              </div>
            </form>
          </div>
          <div class="sub-cont">
            <div class="img">
              <div class="img__text m--up">
                <h2>PT Wira Utama Jaya</h2>

              </div>
            </div>
            <div>
              <form class="theme-form">
                <h4>Signup</h4><br>
                <div class="form-group">
                  <label class="col-form-label pt-0">Name</label>
                  <input  id="name" type="text"
                                class="form-control @error('name') is-invalid @enderror" name="name"
                                value="{{ old('name') }}" required autocomplete="name"  autofocus>
                  @error('name')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="exampleFormControlSelect9">Role</label>
                  <select class="form-control digits" id="exampleFormControlSelect9">
                    <option disabled selected hidden></option>
                    <option>admin</option>
                    <option>teknisi</option>
                    <option>ketua cabang</option>
                    <option>Head office</option>
                  </select>
                </div>
                <div class="form-group ">
                  <label class="col-form-label pt-0">Telephone</label>
                  <input  id="nohp" type="tel"
                                class="form-control @error('nohp') is-invalid @enderror" name="nohp"
                                value="{{ old('nohp') }}" required autocomplete="nohp"  autofocus>
                  @error('nohp')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label class="col-form-label pt-0">Email</label>
                  <input  id="email" type="email"
                                class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email"  autofocus>
                  @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label class="col-form-label">Password</label>
                  <input id="password" type="password"
                                 class="form-control @error('password') is-invalid @enderror" name="password"
                                 required autocomplete="current-password">
                  @error('password')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="form-group row mt-3 mb-0">
                  <button class="btn btn-primary btn-block" type="submit">Signup</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection --}}
