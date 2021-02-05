<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route('masuk.edit',$id->id)}}" method="post">
    @csrf
    @method('put')
    <select name="barang" id="">
        @foreach ($barang as $b)
        <option value="{{$b->id}}">{{$b->name}}</option>
        @endforeach
    </select>
    <select name="suplier" id="">
        @foreach ($suplier as $s)
        <option value="{{$s->id}}">{{$s->name}}</option>
        @endforeach
    </select>
    <select name="gudang" id="">
        @foreach ($gudang as $g)
        <option value="{{$g->id}}">{{$g->name}}</option>
        @endforeach
    </select>
    <input type="number" name="kuantiti" placeholder="kuantiti">
    <input type="number" name="harga" placeholder="harga">
    <input type="text" name="kode_akuntan" placeholder="kode_akuntan">
    
    <button type="submit">submit</button>
</form>
</body>
</html>