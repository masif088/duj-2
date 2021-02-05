<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route('barang.create')}}" method="post">
    @csrf
    <input type="text" name="name" placeholder="nama">
    <button type="submit">submit</button>
</form>
<table>
    <thead>
        <tr>
            <th>nama</th>
     
        </tr>
    </thead>
    <tbody>
        @foreach ($barang as $b)  
        <tr>
            <td>{{$b->name}}</td>
            <td><a href="{{route('masuk.create',$b->id)}}">Tambah barang masuk</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
</body>
</html>