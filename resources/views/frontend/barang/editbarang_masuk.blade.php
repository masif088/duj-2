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
          <form action="{{route('masuk.edit',$id->id)}}" method="post">
          @csrf
          @method('put')
          <div class="card">
            <div class="card-header">
              <h5 class="card-title">Barang Masuk</h5>
            </div>
            <div class="card-body">
              <div class="mb-2 col-md-4">
                <div class="col-form-label">Suplier</div>
                <select name="suplier" class="js-example-basic-single col-sm-12">
                  @foreach ($suplier as $s)
                  <option value="{{$s->id}}" {!!$id->suplier_id == $s->id ? 'selected' : null  !!}>{{$s->name}}</option>
                      
                  @endforeach  
                </select>
              </div>
              <div class="mb-2 col-md-4">
                <div class="col-form-label">Gudang</div>
                <select name="gudang" class="js-example-basic-single col-sm-12">
                  @foreach ($gudang as $g)
                  <option value="{{$g->id}}" {!!$id->gudang_id == $g->id ? 'selected' : null  !!}>{{$g->name}}</option>
                      
                  @endforeach  
                </select>
              </div>
              <br>

              {{-- <button class="btn btn-success btn-lg" type="button" id="add_form">Add</button> --}}
              <br><br>
              <div class="row container1">
                <div class="col-md-2 mb-3">
                  <label for="validationServer01">Nama Barang</label>

                </div>
                <div class="col-md-2 mb-3">
                  <label for="validationServer02">Kode Akuntan</label>

                </div>
                <div class="col-md-2 mb-3">
                  <label for="validationServer01">Kuantiti</label>

                </div>
                <div class="col-md-2 mb-3">
                  <label for="validationServer02">Harga Satuan</label>

                </div>
                <div class="col-md-2 mb-3">
                  <label for="validationServer01">Total</label>

                </div>
                {{-- <div class="col-md-2 mb-3">
                  <label for="validationServer02">Action</label>

                </div> --}}
              </div>
              <div class="row">
                  <div class="col-md-2 mb-3">
                    <select name="barang" class="js-example-basic-single col-sm-12">
                      @foreach ($barang as $b)
                  <option value="{{$b->id}}" {!!$id->barang_id == $b->id ? 'selected' : null  !!}>{{$b->name}}</option>
                  @endforeach
                    </select>
                  </div>
                <div class="col-md-2 mb-3">
                  <input class="form-control" name="kode_akuntan" value="{{$id->kode_akuntan}}"  type="text" placeholder="kode akuntan" required="">
                </div>
                <div class="col-md-2 mb-3">
                  <input class="form-control" name="kuantiti" value="{{$id->kuantiti}}"  type="number" placeholder="kuantiti" required="">
                </div>
                <div class="col-md-2 mb-3">
                  <input class="form-control" name="harga" value="{{$id->harga_satuan}}" type="number" placeholder="harag satuan" required="">
                </div>
                <div class="col-md-2 mb-3">
                  <input class="form-control" id="total" placeholder="total" value="{{$id->harga_satuan*$id->kuantiti}}" type="text" readonly>
                </div>
                {{-- <div class="col-md-2 mb-3">
                  <button type="button" class="btn btn-danger btn-sm delete" >Delete</button>
                </div> --}}
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
    $(document).ready(function() {
      var max_fields      = 10;
      var wrapper         = $(".container1");
      var add_button      = $("#add_form");

      var x = 1;
      var dataBarang = '@foreach ($barang as $b) <option value="{{$b->id}}">{{$b->name}}</option> @endforeach'
      $(add_button).click(function(e){
        e.preventDefault();
        if(x < max_fields){
          x++;
          $(wrapper).append(`
          <div class="row">
          <div class="col-md-2 mb-3">
                    <select name="barang" class="js-example-basic-single col-sm-12">
                    ${dataBarang}
                    </select>
                  </div>
                <div class="col-md-2 mb-3">
                  <input class="form-control" name="kode_akuntan"  type="text" placeholder="kode akuntan" required="">
                </div>
                <div class="col-md-2 mb-3">
                  <input class="form-control" name="kuantiti"  type="text" placeholder="kuantiti" required="">
                </div>
                <div class="col-md-2 mb-3">
                  <input class="form-control" name="harga" type="text" placeholder="harag satuan" required="">
                </div>
                <div class="col-md-2 mb-3">
                  <input class="form-control" id="total" placeholder="total"  type="text" readonly>
                </div>
                <div class="col-md-2 mb-3">
                  <button type="button" class="btn btn-danger btn-sm delete" >Delete</button>
                </div>
                </div>
          `); //add input box


        }
        else
        {
          alert('You Reached the limits')
        }
      });

      $(wrapper).on("click",".delete", function(e){
    e.preventDefault(); $(this).parent('div').remove(); x--;
  })
  });
  </script>
@endsection
