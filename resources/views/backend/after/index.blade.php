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
                <th>No</th>
                <th>Nama pembeli</th>
                <th>nama teknisi</th>
                <th>nama produk</th>
                <th>tanggal pengajuan</th>
                <th>lama</th>
                <th>sparepart</th>
                <th>status</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($after as $i =>$a)
                
            <tr>
                <td>{{$i+1}}</td>
                <td>{{$a->nama_pembeli}}</td>
                <td>{{$a->serviceAfter->user->name ?? 'belum'}}</td>
                <td>{{$a->barcode->masuk->barang->name}}</td>
                <td>{{$a->created_at->format('d-M-Y')}}</td>
                <td>{{$a->serviceAfter->lama ?? '0'}} Hari</td>
                <td>{{$a->serviceAfter->sparepart ?? 'belum'}}</td>
                <td>{{$a->serviceAfter->status}}</td>
                <td>
                    @if ($a->serviceAfter->status != 'selesai' && $a->serviceAfter->status != 'pengajuan')
                    <a href="{{route('serviceAfter.edit',$a->serviceAfter->id)}}">Ambil</a>
                    @endif
                    <a href="{{route('after.edit',$a->id)}}">edit</a>
                    @if ($a->serviceAfter->status == 'pengajuan')
                        
                    <a href="{{route('after.setuju',$a->id)}}">Setujui</a>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
</body>
</html>