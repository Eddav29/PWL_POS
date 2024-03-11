<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=., initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ubah data user</title>
</head>
<body>
    <h1>Form Ubah Data User</h1>
    <a href="/user">kembali</a>
    <form action="{{ route('/user/ubah_simpan',$data->user_id)}}" method="post">
    <br>
    {{ csrf_field() }}
    {{ method_field('PUT')}}
    {{-- {{ method_field('PUT') }} --}}
    <input type="hidden" name="user_id" value="{{ $data->user_id }}">
    <label for="username">Username</label>
    <input type="text" name="username" id="username" value="{{ $data->username }}"><br>
    <label for="nama">Nama</label>
    <input type="text" name="nama" id="nama" value="{{ $data->nama }}"><br>
    <label for="level_id">Level ID</label>
    <input type="text" name="level_id" id="level_id" value="{{ $data->level_id }}"><br>
    
    <button type="submit" class="btn btn-warning" value="ubah">Ubah</button>
</form>
</body>
</html>