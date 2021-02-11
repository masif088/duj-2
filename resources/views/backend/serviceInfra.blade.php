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
                <th>nama barang</th>
                <th>nama teknisi</th>
                <th>kode</th>
                <th>tanggal pengajuan</th>
                <th>tanggal selesai</th>
                <th>sparepart</th>
                <th>lama</th>
                <th>status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($service as $i=>$m)
                    <td>{{$i+1}}</td>
                    <td>{{$m->infra->name}}</td>
                    <td>{{$m->user->name ?? 'tidak ada'}}</td>
                    <td>{{$m->infra->kode}}</td>
                    <td>{{$m->created_at->format('d-M-Y')}}</td>
                    <td>{{$m->status == 'selesai' ? $m->updated_at->format('d-M-Y') : 'belum selesai'}}</td>
                    <td>{{$m->sparepart ?? 'null'}}</td>
                    <td>{{$m->lama}} hari</td>
                    <td>{{$m->status}}</td>
                    <td>
                        @if (($m->user_id == null || $m->user_id != null && $m->user_id  == auth()->user()->id) && $m->status != 'selesai' && $m->status != 'pengajuan')
                        <a href="{{route('serviceInfra.edit',$m->id)}}">Ambil</a>
                        @endif
                        @if ($m->status == 'pengajuan')
                        <a href="{{route('serviceInfra.setuju',$m->id)}}">setuju</a>
                            
                        @endif
                       
                        {{-- <a href="{{route('infra.barcode',$m->id)}}">barcode</a>
                        <form style="display: inline" action="{{route('serviceInfra.create',$m->id)}}" method="POST">
                        @csrf
                        <button type="submit">ajukan</button>
                        </form> --}}
                    </td>
                @endforeach
                <td></td>
            </tr>
        </tbody>
    </table>
</body>
</html>