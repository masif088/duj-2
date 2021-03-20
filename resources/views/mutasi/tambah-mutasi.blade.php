@extends('frontend.layout-frontend.master')
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
          <form action="{{route('masuk.create')}}" method="post">
          @csrf
          <div class="card">
            <div class="card-header">
              <h5 class="card-title">Mutasi Barang</h5>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="mb-2 col-md-4 row">
                  <div class="col-form-label">Gudang Tujuan</div>
                  <select name="suplier" class="js-example-basic-single col-sm-12">

                  </select>
                </div>
                <div class="mb-2 col-md-4">
                  <div class="col-form-label">Kode</div>
                  <input type="text"  name="Barcode"  class="form-control" placeholder="Barcode"/>
                </div>
              </div>

              <br>
              <button class="btn btn-primary tombol-tambah-barang" type="button" style=" ">Tambah</button>
              <br><br>
              <div class="table-responsive invoice-table" id="table">
                  <table class="table table-bordered table-striped tabel-form-barang">
                      <thead class="active">
                          <tr>
                            <th>Tanggal</th>
                            <th>Nama Barang</th>
                            <th>Gudang Awal</th>
                            <th>Gudang Tujuan</th>
                            <th>Total</th>
                            {{-- <th>Total</th> --}}
                          </tr>
                          </thead>
                      <tbody>
                        <tr>
                          <td>
                            <input type="text"  name="Tanggal[]"  class="form-control" placeholder="20/3/2021" value="20/3/2021" disabled/>
                          </td>
                            <td>
                              <div class="main">
                                <input type="text"  name="Nama_Barang[]"  class="form-control" placeholder="Nama Barang" value="Nama Barang" disabled/>
                              </div>
                            </td>
                            <td>
                                <input type="text"  name="g_awal[]"  class="form-control" placeholder="Gudang Awal" value="Gudang Awal" disabled/>
                            </td>
                            <td>
                                <input type="text" name="g_tujuan[]" class="form-control" placeholder="Gudang Tujuan" value="Gudang Tujuan" disabled/>
                            </td>
                            <td><input type="number" name="total[]" class="form-control" placeholder="Total" /></td>
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
  <script>
  function selectRefresh() {
  $('.main .select2').select2({
    tags: false,
    placeholder: "Select an Option",
    allowClear: true,
    width: '100%'
  });
}
$(document).ready(function() {
selectRefresh();
});
    $('.tombol-tambah-barang').on('click', function() {
        var dd = ''

    var tr = `<tr><td><input type="text"  name="Tanggal[]"  class="form-control" placeholder="20/3/2021" value="20/3/2021" disabled/></td><td><div class="main"><input type="text"  name="Nama_Barang[]"  class="form-control" placeholder="Nama Barang" value="Nama Barang" disabled/></div></td><td><input type="text"  name="g_awal[]"  class="form-control" placeholder="Gudang Awal" value="Gudang Awal" disabled/></td><td><input type="text" name="g_tujuan[]" class="form-control" placeholder="Gudang Tujuan" value="Gudang Tujuan" disabled/></td><td><input type="number" name="total[]" class="form-control" placeholder="Total" /></td><td><button class="btn btn-danger">Hapus</button></td></tr>`;
    $("table.tabel-form-barang tbody").append(tr);
    selectRefresh();
    $("table.tabel-form-barang tbody").find("button").on('click', function() {
        $(this).parent().parent().remove();
    });
  });
</script>

@endsection
