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
                <th>no</th>
                <th>nama</th>
                <th>tanggal mutasi</th>
                <th>kode barcode</th>
                <th>kode mutasi</th>
                <th>Gudang Tujuan</th>
                <th>status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($mutasis as $i=>$m)
                    <td>{{$i+1}}</td>
                    <td>{{$m->masuk->name}}</td>
                    <td>{{$m->mutasi->created_at}}</td>
                    <td>{{$m->kode}}</td>
                    <td>{{$m->mutasi->kode_mutasi}}</td>
                    <td>{{$m->masuk->gudang->name}} -> {{$m->mutasi->gudang->name}}</td>
                    <td>{{$m->mutasi->status}}</td>
                    <td>
                        <a href="{{route('mutasi.edit',$m->mutasi->id)}}">Edit</a>
                       
                        <a href="{{route('mutasi.batal',$m->mutasi->id)}}">Batal</a>
                    
                    </td>
                @endforeach
                <td></td>
            </tr>
        </tbody>
    </table>
</body>
</html>