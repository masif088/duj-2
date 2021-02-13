<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @foreach ($barcode as $b)
    <div style="display:inline-block; margin: 20px;">
        {!! QrCode::size(100)->generate($b->kode); !!}
        <p>Nama: {{$b->masuk->barang->name}}</p>
        <p>kode: {{$b->kode}}</p>
        <p>status: {{$b->status}}</p>
        <p>harga: {{$b->masuk->harga_satuan}}</p>
    </div>
    @endforeach
</body>
</html>