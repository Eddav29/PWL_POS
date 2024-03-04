<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data kategori Pengguna</title>
</head>

<body>
    <h1>Data kategori Pengguna</h1>
    <table border="1" cellpadding="3" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Kode kategori</th>
            <th>Nama kategori</th>
        </tr>
        @foreach ($data as $data)
            <tr>
                <td>{{ $data->kategori_id }}</td>
                <td>{{ $data->kategori_kode }}</td>
                <td>{{ $data->kategori_nama }}</td>
            </tr>
        @endforeach
    </table>
</body>

</html>