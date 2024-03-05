<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah User</title>
</head>
<body>
    <h1>Form Tambah Data User</h1>
    <form method="post" action="{{ route('/user/tambah_simpan') }}">
    {{ csrf_field() }}
    <label for="username">Username</label>
    <input type="text" name="username" id="username" placeholder="Masukkan username"><br><br>
    <label for="nama">Nama</label>
    <input type="text" name="nama" id="nama" placeholder="Masukkan nama"><br><br>
    <label for="password">Password</label>
    <input type="password" name="password" id="password" placeholder="Masukkan password"><br><br>
    <label for="level_id">Level ID</label>
    <input type="text" name="level_id" id="level_id" placeholder="Masukkan level ID"><br><br>
    <button type="submit" class="btn-btn-success" value="simpan">simpan</button>
    </form>
</body>
</html>