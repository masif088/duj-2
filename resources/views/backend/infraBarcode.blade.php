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
    </style>
</head>
<body>

    <div class="flex-container">
        <div>
            <table style="width: 100%;">
                <tr>
                    <td style="width: 70%;">
                        <img src="data:image/png;base64, {!! $b->bb !!}"
                             style="float: none; width: 6.8cm; height: auto;"
                             alt="">
                    </td>
                    <td style="width: 30%;">
                        <p>Nama: {{$b->name}}</p>
                        <p>kode: {{$b->kode}}</p>
                        <p>gudang: {{$b->gudang_id}}</p>
                    </td>
                </tr>
            </table>


        </div>
    </div>
</body>
</html>
