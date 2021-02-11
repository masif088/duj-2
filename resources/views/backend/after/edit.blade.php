<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
   <form action="{{route('serviceAfter.edit',$id->id)}}" method="post">
    @csrf
    @method('put')   
    <input type="number" name="lama" value="{{$id->lama}}" placeholder="lama pengerjaan">
       <textarea name="sparepart" id="" cols="30" rows="10" placeholder="sparepart">{{$id->sparepart}}</textarea>
    @if ($id->lama != null)
    <select name="status" id="">
     <option value="selesai">Selesai</option>
     <option value="tidak">Belum</option>
 </select>
        
    @endif
       <button type="submit">kirim</button>
    </form>
</body>
</html>