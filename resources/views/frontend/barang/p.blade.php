@extends('frontend.layouts.master')
@section('head')
<link rel="stylesheet" type="text/css" href="{{asset('/assets/css/select2.css')}}">
@endsection
@section('content')
  <div class="page-header">
  </div>
  <div class="container-fluid">
    <div class="select2-drpdwn">
      <div class="row">
        <!-- Default Textbox start-->
        <div class="col-md-12">
          <form action="" method="post">
          @csrf
          @method('put')
          <div class="card">
            <div class="card-header">
              <h5 class="card-title">Barang Masuk</h5>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="mb-2 col-md-4 row">
                  <div class="col-form-label">Suplier</div>
                  <select name="suplier" class="js-example-basic-single col-sm-12">
                    {{-- @foreach ($suplier as $s)
                    <option value="{{$s->id}}" {!!$id->suplier_id == $s->id ? 'selected' : null  !!}>{{$s->name}}</option>

                    @endforeach --}}
                  </select>
                </div>
                <div class="mb-2 col-md-4">
                  <div class="col-form-label">Gudang</div>
                  <select name="gudang" class="js-example-basic-single col-sm-12">
                    {{-- @foreach ($gudang as $g)
                    <option value="{{$g->id}}" {!!$id->gudang_id == $g->id ? 'selected' : null  !!}>{{$g->name}}</option>

                    @endforeach --}}
                  </select>
                </div>
              </div>

              <br>
              <button class="btn btn-primary tombol-tambah-barang" type="button" style=" ">Tambah</button>
              <br><br>
              <div class="table-responsive invoice-table" id="table">
                  <table class="table table-bordered table-striped tabel-form-barang">
                      <thead class="active">
                          <tr>
                            <th>Nama Barang</th>
                            <th>Kode Akuntan</th>
                            <th>Kuantiti</th>
                            <th>Harga Satuan</th>
                            <th>Total</th>
                          </tr>
                          </thead>
                      <tbody>
                        <tr>
                            <td>
                              <div class="main">
                                <select class="form-control select2">
                                  <option></option>
                                  <option>test 1</option>
                                  <option>test 2</option>
                                  <option>test 3</option>
                                  <option>test 4</option>
                                </select>
                              </div>

                                {{-- <input type="text" name="nama-barang[]" class="form-control" placeholder="Nama Barang"/> --}}
                            </td>
                            <td>
                                <input type="text"  name="Kode-Akuntan[]"  class="form-control" placeholder="Kode Akuntan"/>
                            </td>
                            <td>
                                <input type="text" name="Kuantiti[]" class="form-control" placeholder="Kuantiti"/>
                            </td>
                            <td><input type="text" name="harga-satuan[]" class="form-control" placeholder="harga-satuan"/></td>
                            <td><input type="text" name="Total[]" class="form-control" placeholder="Total"/></td><td></td>
                        </tr>
                      </tbody>
                  </table>
                </div>
              <div class="col-md-12">
                <button type="submit" class="btn btn-primary">selesai</button>
              </div>
            </div>
          </div>
        </div>
      </form>

        <!-- Input Groups end-->
      </div>
    </div>
  </div>
@endsection
@section('script')
  <script src="{{asset('/assets/js/select2/select2.full.min.js')}}"></script>
  <script src="{{asset('/assets/js/select2/select2-custom.js')}}"></script>
  <script type="text/javascript">
  function selectRefresh() {
  $('.main .select2').select2({
    tags: true,
    placeholder: "Select an Option",
    allowClear: true,
    width: '100%'
  });
}
$(document).ready(function() {
selectRefresh();
});
    $('.tombol-tambah-barang').on('click', function() {
    var tr = '<tr><td><div class="main"><select class="form-control select2"><option></option><option>test 1</option><option>test 2</option><option>test 3</option></select></div></td><td><input type="text"  name="nama-akuntan[]"  class="form-control" placeholder="Kode Akuntan"/></td><td><input type="text" name="kuantiti[]" class="form-control" placeholder="Kuantiti"/></td><td><input type="text"  name="harga-satuan[]"  class="form-control" placeholder="Harga Satuan"/></td><td><input type="text" name="total[]" class="form-control" placeholder="Total"/></td><td><button class="btn btn-danger">delete</button></td></tr>';
    $("table.tabel-form-barang tbody").append(tr);
    selectRefresh();
    $("table.tabel-form-barang tbody").find("button").on('click', function() {
        $(this).parent().parent().remove();
    });
  });
</script>

@endsection
