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
                    <h5>Log User</h5>
                </div>
                <div class="card-body">
                    <hr>
                    <div class="table-responsive invoice-table" id="table">
                        <table class="table table-bordered table-striped">
                            <thead class="active">
                                <tr>
                                    <th>No</th>
                                    <th>Nama User</th>
                                    <th>Tipe Data</th>
                                    <th>Deskripsi</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td>1</td>
                                    <td>User1</td>
                                    <td>Tes</td>
                                    <td>TES TES</td>

                                    <td>
                                        <a href="">
                                            <button type="button" class="btn btn-info btn-sm">Ubah</button>
                                        </a>
                                        <a href="">
                                            <button type="button" class="btn btn-danger btn-sm">Hapus</button>
                                        </a>
                                    </td>
                                </tr>


                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
