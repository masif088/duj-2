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
                <th>kode</th>
                <th>tanggal</th>
                <th>status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($infra as $i=>$m)
                    <td>{{$i+1}}</td>
                    <td>{{$m->name}}</td>
                    <td>{{$m->kode}}</td>
                    <td>{{$m->created_at->format('d-M-Y')}}</td>
                    <td>{{$m->status}}</td>
                    <td>
                        <a href="{{route('infra.edit',$m->id)}}">Edit</a>
                       
                        <a href="{{route('infra.barcode',$m->id)}}">barcode</a>
                        
                        <form style="display: inline" action="{{route('serviceInfra.create',$m->id)}}" method="POST">
                        @csrf
                        <button type="submit">ajukan kerusakan</button>
                        </form>
                        
                    </td>
                @endforeach
                <td></td>
            </tr>
        </tbody>
    </table>
</body>
</html>