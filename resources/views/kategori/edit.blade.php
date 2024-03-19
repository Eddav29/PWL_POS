@extends('layouts.app')

{{-- Menyesuaikan bagian layout --}}

@section('subtitle', 'Kategori')
@section('content_header_title', 'Kategori')
@section('content_header_subtitle', 'Edit')

{{-- Konten utama: konten halaman utama --}}

@section('content')
    <div class="container">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Kategori</h3>
            </div>

            <form action="{{ route('kategori.update', $kategori->kategori_id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="kodeKategori">Kode Kategori</label>
                        <input type="text" name="kategori_kode" class="form-control" id="kodeKategori"
                            placeholder="Masukkan Kode" value="{{ $kategori->kategori_kode }}">
                    </div>
                    <div class="form-group">
                        <label for="namaKategori">Nama Kategori</label>
                        <input type="text" class="form-control" name="kategori_nama" id="namaKategori"
                            placeholder="Masukkan Nama" value="{{ $kategori->kategori_nama }}">
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
