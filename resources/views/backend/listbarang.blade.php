<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Tanggal masuk</th>
                <th>nama</th>
                <th>Harga satuan</th>
                <th>suplier</th>
                <th>gudang</th>
                <th>Nama OP</th>
                <th>Kode Akuntan</th>
                <th>Kuantiti</th>
                <th>Jumlah Aktif</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($masuk as $m)
            <tr>
                <td>{{$m->created_at}}</td>
                <td>{{$m->barang->name}}</td>
                <td>{{$m->harga_satuan}}</td>
                <td>{{$m->suplier->name}}</td>
                <td>{{$m->gudang->name}}</td>
                <td>{{$m->user->name}}</td>
                <td>{{$m->kode_akuntan}}</td>
                <td>{{$m->kuantiti}}</td>
                <td>{{$m->barcode()->where('status','aktif')->count()}}</td>
                <td><a href="{{route('barcode.index',$m->id)}}">Lihat/print Barcode</a></td>
                <td><a href="{{route('masuk.edit',$m->id)}}">Edit</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>