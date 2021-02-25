@extends('frontend.layout-frontend.master')
@section('content')
  <div class="page-header">
  </div>
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-body">
            <div class="invoice">
              <div>
                <div>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="media">
                        <div class="media-left"><img class="media-object img-60" src="../assets/images/other-images/logo-login.png" alt=""></div>
                        <div class="media-body m-l-20">
                          <h4 class="media-heading">Adira Utama Jaya</h4>
                          <p>admin@gmail.com<br><span class="digits">082222222222</span></p>
                        </div>
                      </div>
                      <!-- End Info-->
                    </div>
                    <div class="col-sm-6">
                      <div class="text-md-right">
                        <h3>Invoice #<span class="digits counter">1069</span></h3>
                        <p>Checkout berhasil: May<span class="digits"> 27, 2015 |</span><span class="digits"> 15:00 WIB</span><br>
                          Batas Waktu Pembayaran: June <span class="digits">28, 2015 |</span><span class="digits"> 15:00 WIB</span></p>
                      </div>
                      <!-- End Title-->
                    </div>
                  </div>
                </div>
                <hr>
                <!-- End InvoiceTop-->
                <div class="row">
                  <div class="col-md-4">
                    <div class="media">
                      <div class="media-left"><img class="media-object rounded-circle img-60" src="../assets/images/user/1.jpg" alt=""></div>
                      <div class="media-body m-l-20">
                        <h4 class="media-heading">Johan Deo</h4>
                        <p>JohanDeo@gmail.com<br><span class="digits">Cabang 1</span></p>
                      </div>
                    </div>
                  </div>
                  {{-- <div class="col-md-8">
                    <div class="text-md-right" id="project">
                      <h6>Project Description</h6>
                      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                    </div>
                  </div> --}}
                </div>
                <!-- End Invoice Mid-->
                <div>
                  <div class="table-responsive invoice-table" id="table">
                    <table class="table table-bordered table-striped">
                      <tbody>
                        <tr>
                          <td class="item">
                            <h6 class="p-2 mb-0">Barang</h6>
                          </td>
                          <td class="Hours">
                            <h6 class="p-2 mb-0">Gudang Awal</h6>
                          </td>
                          <td class="Rate">
                            <h6 class="p-2 mb-0">Gudang Tujuan</h6>
                          </td>
                          <td class="subtotal">
                            <h6 class="p-2 mb-0">Total</h6>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <label>Lorem Ipsum</label>
                            <p class="m-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                          </td>
                          <td>
                            <p class="itemtext digits">Cabang 1</p>
                          </td>
                          <td>
                            <p class="itemtext digits">Pusat</p>
                          </td>
                          <td>
                            <p class="itemtext digits">2000</p>
                          </td>

                        <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                          {{-- <td class="Rate">
                            <h6 class="mb-0 p-2">Total</h6>
                          </td> --}}
                          <td class="payment digits">
                            <h6 class="mb-0 p-2">2000</h6>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <!-- End Table-->
                  <div class="row">
                    <div class="col-md-8">
                      <div>
                        <p class="legal"><strong>Thank you for your business!</strong>  Payment is expected within 31 days; please process this invoice within that time. There will be a 5% interest charge per month on late invoices.</p>
                      </div>
                    </div>
                    <div class="col-md-4">
                        {{-- <form class="text-right">
                          <input type="image" src="../assets/images/other-images/paypal.png" name="submit" alt="PayPal - The safer, easier way to pay online!">
                        </form> --}}
                    </div>
                  </div>
                </div>
                <!-- End InvoiceBot-->
              </div>
              <div class="col-sm-12 text-center mt-3">
                <button class="btn btn btn-primary mr-2" type="button" onclick="myFunction()">Print</button>
                <button class="btn btn-secondary" type="button">Cancel</button>
              </div>
              <!-- End Invoice-->
              <!-- End Invoice Holder-->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
