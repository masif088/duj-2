<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route('suplier.create')}}" method="post">
    @csrf
    <input type="text" name="name" placeholder="nama">
    <input type="text" name="no_hp" placeholder="no">
    <input type="text" name="alamat" placeholder="alamat">
    
    <button type="submit">submit</button>
</form>
</body>
</html>