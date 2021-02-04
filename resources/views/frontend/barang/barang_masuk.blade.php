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
          <div class="card">
            <div class="card-header">
              <h5 class="card-title">Barang Masuk</h5>
            </div>
            <div class="card-body">
              <div class="mb-2 col-md-4">
                <div class="col-form-label">Suplier</div>
                <select class="js-example-basic-single col-sm-12">
                    <option value="AL">Alabama</option>
                    <option value="WY">Wyoming</option>
                    <option value="WY">Peter</option>
                    <option value="WY">Hanry Die</option>
                    <option value="WY">John Doe</option>
                </select>
              </div>
              <br>
              <button class="btn btn-success btn-lg" type="button" id="add_form">Add</button>
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
                <div class="col-md-2 mb-3">
                  <label for="validationServer02">Action</label>

                </div>
              </div>
              <div class="row">
                <div class="col-md-2 mb-3">
                  <input class="form-control"  type="text" value="Mark" required="">
                </div>
                <div class="col-md-2 mb-3">
                  <input class="form-control"  type="text" value="1" required="">
                </div>
                <div class="col-md-2 mb-3">
                  <input class="form-control"  type="text" value="Mark" required="">
                </div>
                <div class="col-md-2 mb-3">
                  <input class="form-control"  type="text" value="Otto" required="">
                </div>
                <div class="col-md-2 mb-3">
                  <input class="form-control"  type="text" value="Mark" required="">
                </div>
                <div class="col-md-2 mb-3">
                  <button type="button" class="btn btn-danger btn-sm delete" >Delete</button>
                </div>
              </div>

            </div>
          </div>
        </div>
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
      $(add_button).click(function(e){
        e.preventDefault();
        if(x < max_fields){
          x++;
          $(wrapper).append('<div class="col-md-2 mb-3"><input class="form-control"  type="text" value="Mark" required=""></div><div class="col-md-2 mb-3"><input class="form-control"  type="text" value="Mark" required=""></div><div class="col-md-2 mb-3"><input class="form-control"  type="text" value="Mark" required=""></div><div class="col-md-2 mb-3"><input class="form-control"  type="text" value="Mark" required=""></div><div class="col-md-2 mb-3"><input class="form-control"  type="text" value="Mark" required=""></div><div class="col-md-2 mb-3"><button type="button" class="btn btn-danger btn-sm delete" >Delete</button></div>'); //add input box


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
