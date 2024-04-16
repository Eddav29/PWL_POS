{{-- @extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
<h1>Dashboard</h1>
@stop
@section('content')
<div class="card-body">
<form>
<div class="row">
<div class="col-sm-6">
<!-- text input -->
<div class="form-group">
<label>Level id</label><input type="text" class="form-control" placeholder="id">
<div>
</div>
<button type = "submit" class ="btn btn-info">Submit </button>
</div>
@stop
@section('css')
Add here extra stylesheets --}}
{{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
{{-- @stop
@section('js')
<script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop --}}

@extends('layouts.app')

@section('subtitle', 'Level')
@section('content_header_title', 'Level')
@section('content_header_subtitle', 'Tambah')

@section('content')
<div class="container">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah Level</h3>
        </div>

        <form action=/" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="kodeLevel">Kode Level</label>
                    <input type="text" name="kodeLevel" class="form-control" id="kodeLevel" placeholder="Masukkan Kode Level">
                </div>
                <div class="form-group">
                    <label for="namaLevel">Nama Level</label>
                    <input type="text" class="form-control" name="namaLevel" id="namaLevel" placeholder="Masukkan Nama Level">
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>

<div class="container">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah User</h3>
        </div>

        <form method="post" action="{{ route('/user/tambah_simpan') }}">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control" id="username" placeholder="Masukkan Username">
                </div>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan Password">
                </div>
                <div class="form-group">
                    <label for="level_id">Level ID</label>
                    <input type="text" class="form-control" name="level_id" id="level_id" placeholder="Masukkan Level ID">
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection
