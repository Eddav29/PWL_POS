@extends('layouts.app')

@section('subtitle', 'Pengguna')
@section('content_header_title', 'Beranda')
@section('content_header_subtitle', 'Pengguna')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="/m_user/create" class="btn btn-primary"><i class="fas fa-plus mr-1"></i>Tambah Data Pengguna</a>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Level</th>
                                    <th>Nama Pengguna</th>
                                    <th>Nama</th>
                                    <th>Password</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($useri as $user)
                                    <tr>
                                        <td>{{ $user->user_id }}</td>
                                        <td>{{ $user->level->level_nama }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->nama }}</td>
                                        <td>{{ $user->password }}</td>
                                        <td>
                                            <form action="{{ route('m_user.destroy', $user->user_id) }}" method="POST">
                                                <a class="btn btn-primary" href="{{ route('m_user.show', $user->user_id) }}">Tampilkan</a>
                                                <a class="btn btn-success" href="{{ route('m_user.edit', $user->user_id) }}">Edit</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
