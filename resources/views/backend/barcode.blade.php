<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .flex-container {
            display: inline;
        }
        .container_2 {
            -webkit-transform: rotate(90deg);
            -moz-transform: rotate(90deg);
            -o-transform: rotate(90deg);
            -ms-transform: rotate(90deg);
            transform: rotate(90deg);
        }
    </style>
</head>
<body>
@foreach ($barcode as $b)
    <div class="flex-container container_2">
        <div>
            <table style="width: 100%;">
                <tr>
                    <td style="width: 70%;">
                        <img src="data:image/png;base64, {!! $b->bb !!}"
                             style="float: none; width: 6.8cm; height: auto;"
                             alt="">
                    </td>
                    <td style="width: 30%;">
                        <p>Nama: {{$b->masuk->barang->name}}</p>
                        <p>kode: {{$b->kode}}</p>
                        @if (auth()->user()->role == 'admin')
                            <p>status: {{$b->status}}</p>
                            <p>gudang:{{$b->masuk->gudang_id}}</p>
                            <p>harga: {{$b->masuk->harga_satuan}}</p>
                        @endif
                    </td>
                </tr>
            </table>


        </div>
    </div>
@endforeach
</body>
</html>
