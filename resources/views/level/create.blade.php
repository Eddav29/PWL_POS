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

        <form action="/level" method="POST">
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
@endsection
