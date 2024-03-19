@extends('layouts.app')

@section('subtitle', 'Kategori')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'Kategori')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="card-title">Manage Kategori</h3>
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{ route('/kategori/create') }}" class="btn btn-primary">Tambah</a>
                </div>
            </div>
        </div>

        <div class="card-body">
            {{ $dataTable->table() }}
        </div>
    </div>

@endsection

@push('scripts')
    {{ $dataTable->scripts() }}
@endpush
