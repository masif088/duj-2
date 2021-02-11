<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route('infra.edit',$id->id)}}" method="post">
        @csrf
        @method('put')
        <input type="text" name="name" value="{{$id->name}}" placeholder="Nama">
        <button type="submit">Submit</button>
    </form>
</body>
</html>