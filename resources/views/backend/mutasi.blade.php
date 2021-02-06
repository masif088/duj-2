<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route('mutasi.create')}}" method="post">
    @csrf
    <select name="gudang" id="">
        @foreach ($gudang as $g)
        <option value="{{$g->id}}">{{$g->name}}</option>
        @endforeach
    </select>
    <input type="text" placeholder="barcode" name="kode">
    <button type="submit">submit</button>
    </form>
</body>
</html>