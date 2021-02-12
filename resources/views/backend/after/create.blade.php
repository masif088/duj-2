<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route('after.create')}}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="text" name="kode" placeholder="barcode">
    <input type="text" name="nama_pembeli" placeholder="nama pembeli">
    <input type="text" name="alamat" placeholder="alamat">
    <input type="text" name="no_hp" placeholder="no hp">
    <input type="file" name="file">
    <button type="submit">submit</button>
    </form>
</body>
</html>